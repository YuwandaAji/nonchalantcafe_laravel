<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman Login & Register (HTML yang kita buat tadi)
    public function showAuthForm()
    {
        return view('login'); // pastikan nama file Anda login.blade.php
    }

    // Proses Login
public function login(Request $request)
{
    // 1. Validasi input dari form (name="email" dan name="password")
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 2. Petakan input form ke nama kolom di database
    // Laravel Auth akan mencocokkan 'customer_email' dengan email 
    // dan 'password' (otomatis) dengan customer_password melalui Model
    $authData = [
        'customer_email' => $credentials['email'],
        'password' => $credentials['password'],
    ];

    if (Auth::guard('customer')->attempt($authData)) {
        $request->session()->regenerate();
        
        // Sesuaikan redirect ke route home Anda
        return redirect()->intended('/'); 
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}

    // Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:customer,customer_email',
            'customer_password' => 'required|min:6',
        ]);

        Customer::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_password' => Hash::make($request->customer_password),
        ]);

        return back()->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}