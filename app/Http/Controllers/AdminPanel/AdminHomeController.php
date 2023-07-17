<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Servers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class AdminHomeController extends Controller
{



    public function index()
    {
        return view('admin.index', [
            'display_status' => 'none'
        ]);
    }

    public function store(Request $request)
    {


    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }





}
