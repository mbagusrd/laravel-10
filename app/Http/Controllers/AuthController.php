<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Jika berhasil, redirect ke halaman beranda atau halaman tujuan yang diinginkan
            return redirect()->intended('/');
        }

        // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Username dan password tidak cocok',
        ]);
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
