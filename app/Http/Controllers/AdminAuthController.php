<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            // cek role admin
            if (Auth::user()->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin/home');
            } else {
                Auth::logout(); // kalau bukan admin, logout langsung
                return redirect('/admin/login')->withErrors([
                    'email' => 'Hanya admin yang bisa login di sini'
                ]);
            }
        }

        return back()->withErrors(['email'=>'Email atau password salah']);
    }
    // public function login(Request $request)
    // {
    //     if (Auth::attempt($request->only('email', 'password'))) {

    //         if (Auth::user()->role !== 'admin') {
    //             Auth::logout();
    //             return back()->with('error', 'Bukan admin');
    //         }

    //         return redirect('/admin/home');
    //     }

    //     return back()->with('error', 'Login gagal');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
