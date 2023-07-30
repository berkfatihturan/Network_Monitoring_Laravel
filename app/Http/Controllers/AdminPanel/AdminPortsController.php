<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Ports;
use App\Models\Servers;
use App\Models\Settings;
use Illuminate\Http\Request;

class AdminPortsController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $serverData = Servers::all();
        $portData = Ports::all();
        $settingsData = Settings::first();

        return view('admin.ports.index', [
            'serverData' => $serverData,
            'portData' => $portData,
            'display_status' => 'none',
            'settingsData' => $settingsData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Ports();
        $data->server_id = $request->server_id;
        $data->port_name = $request->port_name;
        $data->port = $request->port;
        $data->detail = $request->detail;


        $data->save();
        return redirect('admin/ports');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portData = Ports::find($id);
        $settingsData = Settings::first();
        $logData = Log::where('process_id',$id)->where('process_type',2)->get();

        return view('admin.ports.show', [
            'portData' => $portData,
            'settingsData' => $settingsData,
            'logData' => $logData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Ports::find($id);
        $data->server_id = $request->server_id;
        $data->port_name = $request->port_name;
        $data->port = $request->port;
        $data->detail = $request->detail;


        $data->save();
        return redirect('admin/ports');
    }


    public function reloadPage($id_item, $is_open)
    {
        $item = Ports::find($id_item);

        return view('admin.ports.table_item', [
            'item' => $item,
            'display_status' => $is_open
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ports::find($id);
        $data->delete();

        return redirect(route('admin_ports_index'));
    }
}
