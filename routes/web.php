<?php

use App\Http\Controllers\AdminPanel\AdminHomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\AdminServerController as AdminServerController;
use App\Http\Controllers\AdminPanel\AdminPortsController as AdminPortsController;
use App\Http\Controllers\AdminPanel\AdminSettingsController as AdminSettingController;
use App\Http\Controllers\AdminPanel\AdminProfileController as AdminProfileController;
use App\Http\Controllers\AdminPanel\AdminUsersController as AdminUsersController;
use App\Http\Controllers\AdminPanel\AdminDevicesController as AdminDevicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    if(!Auth::check()) {
        return view('auth.login');
    }else{
        return to_route('admin_profile_index');
    }
});


Route::middleware(['admin'])->prefix('admin')->name("admin_")->group(function (){

    Route::get('/',[AdminServerController::class,'index'])->name('index');

    /* Admin Server Panel Routes*/
    Route::prefix('/server')->name("server_")->controller(AdminServerController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });

    /* Admin Ports Panel Routes*/
    Route::prefix('/ports')->name("ports_")->controller(AdminPortsController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });

    /* Admin Settings Panel Routes*/
    Route::prefix('/devices')->name("devices_")->controller(AdminDevicesController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });

    /* Admin Users Panel Routes*/
    Route::prefix('/users')->name("users_")->controller(AdminUsersController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });

    /* Admin Profile Panel Routes*/
    Route::prefix('/profile')->name("profile_")->controller(AdminProfileController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });


    /* Admin Settings Panel Routes*/
    Route::prefix('/settings')->name("settings_")->controller(AdminSettingController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/reload/{id_item}/{is_open}', 'reloadPage')->name('reloadPage');
    });



});
Route::post('/loginadmin',[AdminHomeController::class, 'loginadmin'])->name('loginadmin');

Route::get('/logoutuser', [AdminHomeController::class, 'logout'])->name("logoutuser");



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

