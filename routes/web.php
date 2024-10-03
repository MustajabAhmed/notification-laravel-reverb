<?php

use App\Events\SystemMaintenanceEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('testing', function () {
    event(new SystemMaintenanceEvent(now()->toDateTimeString()));
    return 'System Maintenance Event Triggered';
});