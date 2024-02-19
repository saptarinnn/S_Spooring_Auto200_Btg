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
    # Booking
    Route::resource('booking', BookingController::class)->except('edit', 'create', 'store');
    # Konfirasi Spooring
    Route::post('spooring-confirm/{id}', [SpooringController::class, 'confirm'])->name('spooring.confirm');
    Route::resource('spooring', SpooringController::class)->only('index', 'show', 'edit', 'update');
    # Homepages
    Route::resource('homepages', HomepageController::class)->only('index', 'store');
    # Pegguna
    Route::resource('users', UserController::class)->except('show');
    # Barang
    Route::resource('barang', BarangController::class)->except('show');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->except('show', 'edit', 'update');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('index', 'create', 'store', 'destroy');
});

# Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    # Homepages
    Route::resource('homepages', HomepageController::class)->only('index', 'store');
    # Pengguna
    Route::resource('users', UserController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    # Booking
    Route::resource('booking', BookingController::class)->only('index');
    # Konfirmasi Spooring
    Route::resource('spooring', SpooringController::class)->only('index');
    # Barang
    Route::resource('barang', BarangController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->only('index', 'create', 'store', 'destroy');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('index', 'create', 'store', 'destroy');
});

# Kepala Bengkel
Route::middleware(['auth', 'role:kbengkel'])->group(function () {
    # Barang
    Route::resource('barang', BarangController::class)->only('index');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->only('index');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('index');
});

# Mekanik
Route::middleware(['auth', 'role:mekanik'])->group(function () {
    # Booking
    Route::resource('booking', BookingController::class)->except('edit', 'create', 'store');
    # Konfirasi Spooring
    Route::post('spooring-confirm/{id}', [SpooringController::class, 'confirm'])->name('spooring.confirm');
    Route::resource('spooring', SpooringController::class)->only('index', 'show', 'edit', 'update');
    # Barang
    Route::resource('barang', BarangController::class)->only('index');
});

# Adm. Gudang
Route::middleware(['auth', 'role:gudang'])->group(function () {
    # Barang
    Route::resource('barang', BarangController::class)->except('show');
    # Barang Masuk
    Route::resource('brg-masuk', BarangMasukController::class)->except('show', 'edit', 'update');
    # Barang Keluar
    Route::resource('brg-keluar', BarangKeluarController::class)->only('index', 'create', 'store', 'destroy');
});

# Authenticate
require __DIR__ . '/auth.php';
