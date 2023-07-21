<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Servers;
use App\Models\Settings;
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

    function pingServer($host)
    {
        $outcome = null;
        $status = null;

        // Execute the ping command
        // if on linux > ping -c < use
        // if on windows > ping -n < use
        exec("ping -n 1 $host", $outcome, $status);

        // Check the status code
        if ($status === 0) {
            // Server responded successfully
            return true;
        } else {
            // Server did not respond
            return false;
        }
    }




    public function handle()
    {
        $details = [
            'ip' => '',
            'updated_at' => ''
        ];

        $serverData = Servers::all();

        foreach ($serverData as $item) {
            $server = $item->ip;
            $response = $this->pingServer($server);

            if ($response && $item->status) {

                $details['ip'] = $item->ip;
                $details['updated_at'] = now();
                $mail = new AlertMail($details);
                Mail::to('bft_@outlook.com')->send($mail);

            }

            $item->status = $response;
            $item->updated_at = now();
            $item->save();
        }

        $this->info('Database checked successfully!');
    }
}
