<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    public function viewLogin()
    {
        return view('login', [
            'title' => 'Halaman Login'
        ]);
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/panel-admin')->withToastSuccess('Login Berhasil');
        }

        return redirect()->back()->withToastError('Email Atau Password yang dimasukkan salah...');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
