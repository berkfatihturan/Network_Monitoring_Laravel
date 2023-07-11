<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    function pingServer($host)
    {
        $outcome = null;
        $status = null;

        // Execute the ping command
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

    public function index()
    {

        $serverData = Servers::all();

        foreach ($serverData as $item) {
            $server = $item->ip;
            $response = $this->pingServer($server);
            if ($response) {
                $item->status = "True";
            } else {
                $item->status = "False";
            }
            $item->save();
        }

//        for ($i = 1; $i <= 50; $i++) {
//            $server = '192.168.1.240';
//            $response = $this->pingServer($server);
                //$data = "";
//            if ($response) {
//                $data =  "Server $server is responsive.";
//            } else {
//                $data =  "Server $server is not responsive.";
//            }
//        }


        return view('admin.index', [
            'serverData' => $serverData
        ]);
    }

    public function store(Request $request)
    {
        $data = new Servers();
        $data->server_name = $request->server_name;

        $data->ip = $request->ip;
        $data->status = $request->status;
        $data->save();
        return redirect('admin/index');

    }
}
