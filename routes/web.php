<?php

use App\Http\Controllers\AdminPanel\AdminHomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\AdminServerController as AdminServerController;
use App\Http\Controllers\AdminPanel\AdminPortsController as AdminPortsController;
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
    return view('welcome');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->prefix('admin')->name("admin_")->group(function (){

    Route::get('/',[AdminHomeController::class,'index'])->name('index');

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
});


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
