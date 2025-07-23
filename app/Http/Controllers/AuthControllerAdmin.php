<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AuthControllerAdmin extends Controller
{
    public function showLogin()
    {
        return view('admin.admin'); // Sesuai dengan view login kamu
    }

    public function registerUser()
    {
        return view('admin.registerUser');
    }

    public function registerAdmin()
    {
        return view(('admin.registerAdmin'));
    }

     public function tampilAdmin()
    {
        return view(('admin.tampilAdmin'));
    }

     public function tampilUser()
    {
        return view(('admin.tampilUser'));
    }

    public function daftarAdmin(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required|string|',
            'username' => 'required|string|max:50|unique:user,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil ditambahkan');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|',
            'username' => 'required|string|max:50|unique:user,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

       return redirect()->route('admin.dashboard')->with('success', 'User berhasil ditambahkan');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // $admin = admin::where('username', $request->username)->first();
        $credentials = $request->only('username', 'password');

        $admin = admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['id_admin' => $admin->id_admin, 'nama_admin' => $admin->nama_admin]);
            return redirect('/admin/dashboard')->with('success', 'Login berhasil!');
        }
        return back()->withErrors(['admin' => 'Username atau password salah'])->withInput();
    }

    public function dashboard_admin()
    {
        if (!session()->has('id_admin')) {
            return redirect()->route('admin.login');
        }

        $today = Carbon::today();

        $totalPendapatan = DB::table('laporan_penjualan')
            ->whereDate('tanggal', $today)
            ->get()
            ->sum(function ($item) {
                return (int) $item->total_harga;
            });

        $jumlahMenu = DB::table('menu')->count();

        $menuDipesan = DB::table('pembayaran')
            ->join('laporan_penjualan', 'pembayaran.id_laporan', '=', 'laporan_penjualan.id_laporan')
            ->whereDate('laporan_penjualan.tanggal', $today)
            ->sum(DB::raw('CAST(pembayaran.jumlah AS UNSIGNED)'));

        return view('admin.dashboard', compact('totalPendapatan', 'jumlahMenu', 'menuDipesan'));

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login')->with('success','Logout berhasil!');
    }
}
