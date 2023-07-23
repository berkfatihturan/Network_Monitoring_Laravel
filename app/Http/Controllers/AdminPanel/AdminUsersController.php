<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use App\Models\user_login_permission;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingsData = Settings::first();
        $userData = User::all();

        return view('admin.users.index',[
            'settingsData' => $settingsData,
            'userData' =>$userData
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
        $userData = User::all();
        foreach ($userData as $user){
            $itemId = $request->input('is_allowed-' . $user->id);

            $data = $user->user_login_permission()->first();
            if($data==null){
                $data = new user_login_permission();
            }

            $data->user_id = $user->id;
            if ($itemId === 'on') {
                $data->is_allowed = true;
            }else{
                $data->is_allowed = false;
            }
            $data->save();
        }

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect(route('admin_users_index'));
    }
}
