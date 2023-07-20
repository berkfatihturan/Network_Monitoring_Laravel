<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Jobs\MyBackgroundJob;
use App\Mail\AlertMail;
use App\Models\Servers;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    public function index()
    {

        $serverData = Servers::all();
        $settingsData = Settings::first();

        return view('admin.server.index', [
            'serverData' => $serverData,
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
        $data = new Servers();
        $data->server_name = $request->server_name;
        $data->ip = $request->ip;
        $data->status = $request->status;

        $data->save();
        return redirect('admin/server');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $data =Servers::find($id);
        $data->server_name = $request->server_name;
        $data->ip = $request->ip;
        $data->status = "None";

        $data->save();
        return redirect('admin/server');
    }


    public function reloadPage($id_item,$is_open)
    {
        $item = Servers::find($id_item);

        return view('admin.server.table_item',[
            'item' => $item,
            'display_status' => $is_open
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Servers::find($id);
        $data->delete();

        return redirect(route('admin_server_index'));

    }
}
