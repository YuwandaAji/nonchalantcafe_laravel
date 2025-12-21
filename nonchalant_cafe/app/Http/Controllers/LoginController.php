<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // Pastikan file kamu ada di resources/views/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek Login untuk Customer
        if (Auth::guard('customer')->attempt([
            'customer_email' => $request->email, 
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // Cek Login untuk Employee (Kasir/Admin)
        if (Auth::guard('employee')->attempt([
            'employee_email' => $request->email, 
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/cashier/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}