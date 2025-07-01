<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PembayaranController;
// use App\Http\Controllers\LaporanPenjualanController;

// Route::prefix('admin')->group(base_path('routes/admin.php'));

Route::get('/', function () {
    return view('login');
});

Route::get('/user/laporan', function () {
    return view('laporanPenjualan');
});
Route::get('/user/menu', function () {
    return view('menuPenjualan');
});

//userauth
Route::get('/user/login', [AuthController::class, 'showLogin'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login']);
Route::get('/user/dashboard', [AuthController::class, 'dashboard']);
Route::post('/user/logout', [AuthController::class, 'logout'])->name('user.logout');

//Pembayaran
Route::post('pembayaran/simpan', [PembayaranController::class, 'simpan']);

//menu
Route::get('/menu', [MenuController::class, 'getMenu']);

//laporan
Route::get('user/laporan', [LaporanPenjualanController::class, 'index']);
Route::get('user/detailLaporanPenjualan', [LaporanPenjualanController::class, 'detail']);
  

//export exel
Route::get('/laporan/export', [LaporanPenjualanController::class, 'export'])->name('laporan.export');
