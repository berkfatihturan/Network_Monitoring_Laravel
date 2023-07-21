<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingsData = Settings::first();
        if($settingsData==null){
            $settingsData = new Settings();
            $settingsData->save();
            $settingsData = Settings::first();
        }
        return view('admin.settings.index',[
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
        $data = new Settings();
        $data->company_name = $request->company_name;
        if ($request->file('logo')){
            $data->logo = $request->file('logo')->store('images');
        }

        $data->from_email_address = $request->from_email_address;
        $data->mail_app_password = $request->mail_app_password;

        $data->primary_color = $request->primary_color;
        $data->secondary_color = $request->secondary_color;

        $data->save();
        return redirect('admin/settings');
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
    function updateMailAdress()
    {
        $fromMail = Settings::first()->from_email_address;
        $fromMailPassword = Settings::first()->mail_app_password;

        $envFilePath = base_path('.env');

        $envContent = File::get($envFilePath);
        $updatedEnvContent = preg_replace('/MAIL_USERNAME=([^\n]+)/', 'MAIL_USERNAME=' . $fromMail, $envContent);
        File::put($envFilePath, $updatedEnvContent);

        $envContent = File::get($envFilePath);
        $updatedEnvContent = preg_replace('/MAIL_PASSWORD=([^\n]+)/', 'MAIL_PASSWORD=' . $fromMailPassword, $envContent);
        File::put($envFilePath, $updatedEnvContent);

        $envContent = File::get($envFilePath);
        $updatedEnvContent = preg_replace('/MAIL_FROM_ADDRESS=([^\n]+)/', 'MAIL_FROM_ADDRESS=' .'"' .$fromMail.'"', $envContent);
        File::put($envFilePath, $updatedEnvContent);

        exec('pkill -f "php artisan schedule:work"');
    }

    public function update(Request $request)
    {
        $data = Settings::first();
        if($data==null){
            $data = new Settings();
            $data->save();
            $data = Settings::first();
        }

        $data->company_name = $request->company_name;
        if ($request->file('logo')){
            $data->logo=$request->file('logo')->store('images');
        }
        $data->from_email_address = $request->from_email_address;
        $data->mail_app_password = $request->mail_app_password;

        $data->primary_color = $request->primary_color;
        $data->secondary_color = $request->secondary_color;

        $data->save();
        $this->updateMailAdress();

        return redirect('admin/settings');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
