<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
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

# Home
Route::get('/', fn () => view('home'))->name('home');
Route::get('detail-spooring', fn () => view('guest.detail-spooring'))->name('detail-spooring');
Route::get('success-booking', fn () => view('guest.success-booking'))->name('success-booking');

Route::middleware('auth')->group(function () {
    # Dashboard
    Route::get('dashboard', fn () => view('master.dashboard'))->name('dashboard');

    # Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.delete');
    # Users Search
    Route::post('users/search', [UserController::class, 'search'])->name('users.search');
});

# Authenticate
require __DIR__ . '/auth.php';
