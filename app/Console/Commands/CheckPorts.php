<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Ports;
use App\Models\Servers;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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

    function checkPort($host, $port)
    {
        $connection = @fsockopen($host, $port);

        if (is_resource($connection)) {
            return true;
            fclose($connection);

        } else {
            return false;;
        }
    }

    public function handle()
    {
        $details = [
            'ip' => '',
            'updated_at' => ''
        ];

        $portData = Ports::all();

        foreach ($portData as $item) {
            $port = $item->port;
            $response = $this->checkPort($item->server->ip, intval($port));
            if ($response && $item->status) {

                $details['ip'] = $item->port;
                $details['updated_at'] = now();
                $mail = new AlertMail($details);
                Mail::to('bft_@outlook.com')->send($mail);
            }

            $item->status = $response;
            $item->updated_at = now();
            $item->save();
        }


    }
}
