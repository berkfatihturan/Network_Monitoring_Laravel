<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Servers;
use App\Models\Settings;
use App\Models\User;
use App\Models\user_login_permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class CheckDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    //return true if server work
    function pingServer($host)
    {
        $outcome = null;
        $status = null;

        // Execute the ping command
        // if on linux > ping -c < use
        // if on windows > ping -n < use
        exec("ping -c 1 $host", $outcome, $status);

        // Check the status code
        if ($status === 0) {
            // Server responded successfully
            return true;
        } else {
            // Server did not respond
            return false;
        }
    }


    function sendMailtoUsers($details)
    {
        //getting all users on database
        $users = User::all();

        //send mail to all users
        foreach ($users as $user) {
            if (optional($user->user_login_permission)->is_allowed){
                $details['updated_at'] = now();
                $details['type'] = "Ip";
                $mail = new AlertMail($details);
                // send mail
                Mail::to($user->email)->send($mail);
            }

        }
    }


    public function handle()
    {
        $details = [
            'ip' => '',
            'updated_at' => ''
        ];

        //getting all server on database
        $serverData = Servers::all();

        foreach ($serverData as $item) {
            $server = $item->ip;
            // checking the server is work
            $response = $this->pingServer($server);
            // checking the server is work
            /*
            if ($item->status  && !$response) {

                $details['ip'] = $item->ip;
                // send mail to all users
                $this->sendMailtoUsers($details);

            }
            */

            //update to database
            $item->status = $response;
            $item->updated_at = now();
            $item->save();
        }

        $this->info('Database checked successfully!');
    }
}
