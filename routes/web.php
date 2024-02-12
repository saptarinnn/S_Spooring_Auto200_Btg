<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SpooringController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
# Booking
Route::post('new-booking', [HomeController::class, 'store'])->name('home-booking');
Route::get('booking-success/{id}', [HomeController::class, 'success'])->name('home-booking-success');
Route::get('detail-spooring', [HomeController::class, 'detail'])->name('home-booking-detail');
Route::post('detail-spooring-confirm/{id}', [HomeController::class, 'confirm'])->name('home-booking-confirm');

Route::middleware('auth')->group(function () {
    # Dashboard
    Route::get('dashboard', fn () => view('master.dashboard'))->name('dashboard');
    # Homepages
    Route::resource('homepages', HomepageController::class)->only('index', 'store');
    # Pegguna
    Route::resource('users', UserController::class)->except('show');
    # Barang
    Route::resource('barang', BarangController::class)->except('show');
    # Booking
    Route::resource('booking', BookingController::class)->except('edit', 'create', 'store');
    # Konfirasi Spooring
    Route::post('spooring-confirm/{id}', [SpooringController::class, 'confirm'])->name('spooring.confirm');
    Route::resource('spooring', SpooringController::class)->only('index', 'show', 'edit', 'udpate');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->except('show', 'edit', 'update');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->except('show', 'edit', 'update');
});

# Authenticate
require __DIR__ . '/auth.php';
