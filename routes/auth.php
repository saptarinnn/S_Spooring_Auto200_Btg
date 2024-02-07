<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

# Login
Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginProcess')->name('login.process');
});

# Logout
Route::post('logout/{user}', LogoutController::class)->middleware('auth')->name('logout');
