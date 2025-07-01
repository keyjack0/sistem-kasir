<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/admin');
    // return 'halaman admin';
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/menu', function () {
    return view('admin.menu.daftarMenu');
});
Route::get('/laporanPenjualan', function () {
    return view('admin.laporanPenjualan');
});
Route::get('/detailLaporanPenjualan', function () {
    return view('detailLaporanPenjualan');
});

//adminauth
Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/dashboard', [AuthController::class, 'dashboard_admin']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
