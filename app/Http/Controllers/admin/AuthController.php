<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin/admin');
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $admin = admin::where('username', $credentials['username'])->first();

        if ($admin && $credentials['password'] === $admin->password) {
            session(['id_admin' => $admin->id_admin, 'nama_admin' => $admin->nama_admin]);
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function dashboard_admin()
    {
        if (!session()->has('id_admin')) return redirect('/admin/login');
        return view('admin/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}