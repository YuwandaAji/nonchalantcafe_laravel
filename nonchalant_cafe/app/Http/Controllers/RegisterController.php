<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login');
    }

    // Memproses data register
    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'employee_name' => ['required', 'string', 'max:255'],
            'employee_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'employee_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // 2. Membuat User Baru
        $employee = Employee::create([
            'employee_name' => $request->name,
            'employee_email' => $request->email,
            'employee_password' => Hash::make($request->password), // WAJIB DI-HASH
        ]);

        // 3. Login Otomatis (Opsional)
        Auth::login($employee);

        // 4. Redirect ke Dashboard/Halaman Utama
        return redirect('/'); // Ganti dengan route yang Anda inginkan
    }
}
