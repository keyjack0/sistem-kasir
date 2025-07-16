<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AuthControllerAdmin;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PembayaranController;

// Landing page langsung login user
Route::get('/', [AuthController::class, 'showLogin'])->name('user.login');

// Route User
Route::prefix('user')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('user.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

    Route::get('/laporan', [LaporanPenjualanController::class, 'index']);
    Route::get('/detailLaporanPenjualan', [LaporanPenjualanController::class, 'detail']);
});

// Export laporan
Route::get('/laporan/export', [LaporanPenjualanController::class, 'export'])->name('laporan.export');

// Menu (tanpa prefix user, jika memang untuk umum atau admin juga)
Route::get('/menu', [MenuController::class, 'getMenu']);

// Pembayaran
Route::post('/pembayaran/simpan', [PembayaranController::class, 'simpan']);
