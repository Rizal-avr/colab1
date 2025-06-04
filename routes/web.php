<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Admin\PelangganController;

use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\PricePredictionController;
use App\Http\Middleware\PreventLoginForAuthenticated;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('signin'); // OK
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pelanggan', PelangganController::class)->names('pelanggan');
    Route::get('/get-kecamatan/{id_kabupaten}', [PelangganController::class, 'getKecamatan']);

    Route::resource('/penjualan', PenjualanController::class)->names('penjualan');
});


// Route untuk Owner
Route::middleware(['auth', 'role:owner'])->prefix('owner')->group(function () {
    Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/market-prices', [PricePredictionController::class, 'showPredictionForm'])->name('market.prices');
    Route::post('/predict', [PricePredictionController::class, 'predict'])->name('predict');


    // Tambahkan route owner lainnya di sini
    // Route::get('/profile', [OwnerController::class, 'profile']);
});
