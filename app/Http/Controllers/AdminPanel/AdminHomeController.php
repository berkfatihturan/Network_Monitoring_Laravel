<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Servers;
use App\Models\Settings;
use App\Models\User;
use App\Models\user_login_permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class AdminHomeController extends Controller
{



    public function index()
    {
        $settingsData = Settings::first();
        return view('admin.index', [
            'display_status' => 'none',
            'settingsData' => $settingsData
        ]);
    }

    public function store(Request $request)
    {


    }

    public function loginadmin(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(User::first()==null){
            $adminUser = new User();
            $adminUser->name = "admin";
            $adminUser->email = "admin@admin.com";
            $adminUser->password = '$2y$10$vHKfy.J5AesxLxiFuL680OBjedy0MF5V11aYAO1Tzs2SOWuAM9sT.';
            $adminUser->save();

            $user=User::first();
            $userPermission = new user_login_permission();
            $userPermission->user_id = $user->id;
            $userPermission->is_allowed = true;
            $userPermission->save();
        }

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'error'=>'The provided credentials do not match our record.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }





}
