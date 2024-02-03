<?php

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

Route::get('/', fn () => view('home'));
Route::get('login', fn () => view('guest.login'))->name('login');
Route::get('detail-spooring', fn () => view('guest.detail-spooring'))->name('detail-spooring');
Route::get('success-booking', fn () => view('guest.success-booking'))->name('success-booking');
