<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Devices;
use App\Models\Room;
use App\Models\Servers;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingsData = Settings::first();
        $deviceData = Devices::all();

        return view('admin.devices.index',[
            'settingsData' => $settingsData,
            'deviceData' =>$deviceData
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
    public function store(Request $request,$id)
    {
        $data = new Room();
        if(Room::where('servers_id',$request->server_id)->where('devices_id',$id)->first() == null){
            $data->servers_id = $request->server_id;
            $data->devices_id = $id;
            $data->save();
            return redirect(route('admin_devices_detail',['id'=>$id]));
        }else{
            return redirect(route('admin_devices_detail',['id'=>$id]))->with('error','Alrady Added');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function detail(string $id)
    {
        $settingsData = Settings::first();
        $deviceData = Devices::find($id);
        $serverData = Servers::all();


        return view('admin.devices.detail',[
            'settingsData' => $settingsData,
            'deviceData' =>$deviceData,
            'serverData' =>$serverData,
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
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $did,string $sid)
    {
        $data = Room::where('servers_id',$sid)->where('devices_id',$did)->delete();

        return redirect(route('admin_devices_detail',['id'=>$did]));
    }
}
