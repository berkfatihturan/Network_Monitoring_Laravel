<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Log;
use App\Models\Ports;
use App\Models\Servers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Exception\Exception;
use Throwable;

class CheckPorts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-ports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    //return true if port work
    function checkPort($host, $port)
    {
        $connection = @fsockopen($host, $port);

        if (is_resource($connection)) {
            fclose($connection);
            return true;
        } else {
            return false;
        }
    }

    function sendMailtoUsers($details)
    {
        //getting all users on database
        $users = User::all();

        //send mail to all users
        foreach ($users as $user) {
            if (optional($user->user_login_permission)->is_allowed) {
                try {
                    // send mail
                    Mail::to($user->email)->send(new AlertMail($details));
                } catch (Throwable $e) {

                }

            }
        }
    }

    protected function asDateTime()
    {
        $currentTime = Carbon::now("Europe/Istanbul");
        return $currentTime->toDateTimeString();
    }

    function saveToLog($item,$status)
    {
        // Aynı server_id'ye sahip olan kayıtları tarihlerine göre sıralayarak en eski olanı buluyoruz
        $oldestRecords = Log::where('process_id', $item->id)
            ->where('process_type', 2)
            ->orderBy('created_at')
            ->limit(5) // En eski 5 kayıt
            ->get();

        if ($oldestRecords->count() >= 5) {
            $oldestRecord = $oldestRecords->first();
            $oldestRecord->delete();
        }

        $log = new Log();
        $log->process_type = 2;
        $log->process_id = $item->id;

        $text = "".json_encode($status)." |  ".$this->asDateTime();
        $log->operation = $text;
        $log->save();
    }

    public function handle()
    {
        set_time_limit(59);
        $details = [
            'ip' => '',
            'updated_at' => "",
        ];

        //getting all port on database
        $portData = Ports::all();


        foreach ($portData as $item) {
            $port = $item->port;
            // checking the ports is work
            $response = $this->checkPort($item->server->ip, intval($port));
            // checking status true -> false

            if ($item->status && !$response) {
                $details['ip'] = $item->port;
                $details['updated_at'] = $this->asDateTime();
                $details['type'] = "Port";
                // send mail to all users
                $this->sendMailtoUsers($details);
            }

            //update to database
            $item->status = $response;
            $item->updated_at = $this->asDateTime();
            $this->saveToLog($item,$item->status);
            $item->save();
        }


    }
}
