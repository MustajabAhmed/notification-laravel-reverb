<?php

use App\Events\SystemMaintenanceEvent;
use App\Events\UserPrivateMessageNotification;
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

Route::get('testing/user', function () {
    event(new UserPrivateMessageNotification("Hello, Private User!", Auth::id()));
    return 'Private User Event Triggered';
});