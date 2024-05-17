<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function showRegistForm()
    {
        return redirect()->route('account.create');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'nama_tim'  => 'required',
            'password'  => 'required'
        ], [
            'nama_tim.required' => 'Masukkan nama tim anda',
            'password.required' => 'Masukkan password anda',
        ]);

        $credentials = $request->only('nama_tim', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->with('failed', 'username atau password tidak valid');
        }

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        return redirect()->route('competition');
    }

    public function doLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
