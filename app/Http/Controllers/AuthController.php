<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['id_user' => $user->id_user, 'nama_user' => $user->nama_user]);
            return redirect('/user/dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function dashboard()
    {
        if (!session()->has('id_user')) return redirect('/user/login');
        return view('menuPenjualan');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/user/login');
    }
}
