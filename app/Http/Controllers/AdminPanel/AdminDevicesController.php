<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\DeviceMailSettings;
use App\Models\Devices;
use App\Models\Log;
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
    # add relation device and server
    public function store(Request $request,$id)
    {
        $data = new Room();

        # if device removed and server add to new device remove ex-relation
        if (Room::where('servers_id',$request->server_id)->first() != null){
            Room::where('servers_id',$request->server_id)->delete();
        }

        # if device have DeviceMailSettings update, if not create new
        if(DeviceMailSettings::where('devices_id',$id)->first() == null){
            $mailSetting = new DeviceMailSettings();
        }else{
            $mailSetting = DeviceMailSettings::where('devices_id',$id)->first();
        }

        $mailSetting->devices_id = $id;
        $mailSetting->temp = $request->mailTemp;
        $mailSetting->temp_max = $request->mailTempMax;
        $mailSetting->humidity = $request->mailHumidity;
        $mailSetting->humidity_max = $request->mailHumidityMax;
        $mailSetting->save();

        # check Already exist
        if(Room::where('servers_id',$request->server_id)->where('devices_id',$id)->first() == null){
            if ($request->server_id != "*"){
                $data->servers_id = $request->server_id;
                $data->devices_id = $id;
                $data->save();
            }
            return redirect(route('admin_devices_detail',['id'=>$id]));
        }else{
            # if Already exist not add
            return redirect(route('admin_devices_detail',['id'=>$id]))->with('error','Already Added');
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
        $logData = Log::where('process_id',$id)->where('process_type',3)->get();


        return view('admin.devices.detail',[
            'settingsData' => $settingsData,
            'deviceData' =>$deviceData,
            'serverData' =>$serverData,
            'logData' =>$logData,

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

    public function reloadPage($id_item)
    {
        $deviceData = Devices::all();

        return view('admin.devices.table_item',[
            'deviceData' => $deviceData,
        ]);
    }

    public function reloadShowPage($data_name,$device_id)
    {
        $item = Devices::find($device_id);

        if ($data_name == 'temp')
           return $item->temp;
        elseif ($data_name == 'humidity'){
            return $item->humidity;
        }elseif ($data_name == 'dataset_chart'){
            $logData = Log::where('process_id',$device_id)->where('process_type',3)->get();
            return view('admin.devices.dataset_chart',[
                'logData' => $logData,
            ]);
        }elseif ($data_name== 'log_table'){
            $logData = Log::where('process_id',$device_id)->where('process_type',3)->get();
            return view('admin.devices.log_table',[
                'logData' => $logData,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    # remove relation device and server
    public function destroy(string $did,string $sid)
    {
        $data = Room::where('servers_id',$sid)->where('devices_id',$did)->delete();

        return redirect(route('admin_devices_detail',['id'=>$did]));
    }
}
