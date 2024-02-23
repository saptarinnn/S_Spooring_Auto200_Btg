<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SpooringController;
use App\Http\Controllers\SpooringReportController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    # Select Spooring Report
    Route::post('dashboard', SpooringReportController::class);
});

# Admin
Route::middleware(['role:admin'])->group(function () {
    # Homepages
    Route::resource('homepages', HomepageController::class)->only('index', 'store');
    # Pengguna
    Route::resource('users', UserController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
});

# Mekanik
Route::middleware(['role:mekanik'])->group(function () {
    # Booking
    Route::resource('booking', BookingController::class)->only('update', 'destroy');
    # Spooring
    Route::post('spooring-confirm/{id}', [SpooringController::class, 'confirm'])->name('spooring.confirm');
    Route::resource('spooring', SpooringController::class)->only('edit', 'update');
});

# Admin | Gudang
Route::middleware(['auth', 'role:admin|gudang'])->group(function () {
    # Barang
    Route::resource('barang', BarangController::class)->only('create', 'store', 'edit', 'update', 'destroy');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->only('create', 'store', 'destroy');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('create', 'store', 'destroy');
});

# Admin | Mekanik
Route::middleware(['auth', 'role:admin|mekanik'])->group(function () {
    # Booking
    Route::resource('booking', BookingController::class)->only('index', 'show');
    # Spooring
    Route::resource('spooring', SpooringController::class)->only('index', 'show');
});

# Admin | Gudang | Kepala Bengkel
Route::middleware(['auth', 'role:admin|gudang|kbengkel'])->group(function () {
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->only('index');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('index');
});

# Admin | Gudang | Mekanik | Kepala Bengkel
Route::middleware(['auth', 'role:admin|gudang|mekanik|kbengkel'])->group(function () {
    # Barang
    Route::resource('barang', BarangController::class)->only('index');
});

# Authenticate
require __DIR__ . '/auth.php';
