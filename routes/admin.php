<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthControllerAdmin::class, 'showLogin'])->name('admin.login');
Route::post('/login', [AuthControllerAdmin::class, 'login']);
Route::get('/dashboard', [AuthControllerAdmin::class, 'dashboard_admin'])->name('admin.dashboard');
Route::post('/logout', [AuthControllerAdmin::class, 'logout'])->name('admin.logout');

Route::get('/menu', fn() => view('admin.menu.daftarMenu'));
Route::get('/laporanPenjualan', [LaporanPenjualanController::class, 'adminLaporan']);
// Route::get('/detailLaporanPenjualan', fn() => view('detailLaporanPenjualan'));
Route::get('/detailLaporanPenjualan', [LaporanPenjualanController::class, 'detailAdmin']);

//register
Route::get('register', [AuthControllerAdmin::class, 'registerUser']);
Route::post('daftar', [AuthControllerAdmin::class, 'daftar']);
Route::get('registerAdmin', [AuthControllerAdmin::class, 'registerAdmin']);
Route::post('daftarAdmin', [AuthControllerAdmin::class, 'daftarAdmin']);

//tampil admin adn user
Route::get('/tampilAdmin', [AuthControllerAdmin::class, 'tampilAdmin']);
Route::get('/tampilUser', [AuthControllerAdmin::class, 'tampilUser']);


//menu
Route::get('/menu', [MenuController::class, 'showMenuList']);
Route::get('/menu/create', [MenuController::class, 'create']);
Route::post('/menu/store', [MenuController::class, 'store']);
Route::get('/menu/delete/{id}', [MenuController::class, 'destroy']);
Route::get('/menu/edit/{id}', [MenuController::class, 'edit']);
Route::post('/menu/update/{id}', [MenuController::class, 'update']);



//kategori
Route::get('/kategori', [KategoriController::class, 'showKategori']);
Route::get('/kategori/kategoriTambah', [KategoriController::class, 'kategoriTambah']);
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus']);
Route::post('/kategori/tambah',[KategoriController::class, 'tambah']);
Route::get('/kategori/kategoriUbah/{id}', [KategoriController::class, 'kategoriUbah']);
Route::post('/kategori/ubah/{id}',[KategoriController::class, 'ubah']);



// Route::get('/admin', function () {
//     return view('admin/admin');
//     // return 'halaman admin';
// });
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
// Route::get('/menu', function () {
//     return view('admin.menu.daftarMenu');
// });
// Route::get('/laporanPenjualan', function () {
//     return view('admin.laporanPenjualan');
// });
// Route::get('/detailLaporanPenjualan', function () {
//     return view('detailLaporanPenjualan');
// });

// //adminauth
// Route::get('/admin', [AuthControllerAdmin::class, 'showLogin'])->name('admin.login');
// Route::post('/admin/login', [AuthControllerAdmin::class, 'login']);
// Route::get('/admin/dashboard', [AuthControllerAdmin::class, 'dashboard_admin']);
// Route::post('/admin/logout', [AuthControllerAdmin::class, 'logout'])->name('admin.logout');
