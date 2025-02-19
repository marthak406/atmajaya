<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $guards = ['admin', 'dosen', 'pegawai', 'mahasiswa'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                return redirect()->intended(route('admin.dashboard'));
            }
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}

