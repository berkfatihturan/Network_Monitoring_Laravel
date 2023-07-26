<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Ports;
use App\Models\Servers;
use App\Models\User;
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
                    print($e);
                }

            }
        }
    }

    public function handle()
    {
        $details = [
            'ip' => '',
            'updated_at' => now()
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
                $details['type'] = "Port";
                // send mail to all users
                $this->sendMailtoUsers($details);
            }

            //update to database
            $item->status = $response;
            $item->updated_at = now();
            $item->save();
        }


    }
}
