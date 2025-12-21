<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/account', [ProfileController::class, 'show'])
    ->name('customer.profile')
    ->middleware('auth:customer');

// --- GUEST ROUTES (Login & Register) ---
Route::get('/login', [AuthController::class, 'showAuthForm'])->name('login');
Route::get('/register', [AuthController::class, 'showAuthForm'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- PUBLIC ROUTES ---
Route::get('/', function () {
    return view('customer/homepage');
})->name('home');

// --- CART ROUTES ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');

// --- CUSTOMER PROTECTED ROUTES ---
Route::middleware('auth:customer')->group(function () {
    Route::get('/account', [ProfileController::class, 'show'])->name('customer.profile');
    Route::get('/account/edit', [ProfileController::class, 'edit'])->name('customer.edit');
    Route::put('/account/update', [ProfileController::class, 'update'])->name('customer.update');
});

// --- CASHIER/EMPLOYEE PROTECTED ROUTES ---
// Tambahkan middleware auth:employee jika sudah siap
Route::middleware(['auth:employee'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('cashier.dashboard');
    Route::patch('/order/{id}/process', [DashboardController::class, 'processOrder'])->name('cashier.process');
});

// --- ADMIN / SIDEBAR ROUTES ---
Route::get('/customers', function () { return view('customers'); });
Route::get('/products', function () { return view('products'); });
Route::get('/payments', function () { return view('payments'); });
Route::get('/orders', function () { return view('orders'); });
Route::get('/feedbacks', function () { return view('feedbacks'); });

Route::get('/employees', function () {
    return view('employees', ['employees' => Employee::all()]);
});
Route::get('/employees/{employee_id}', function ($employee_id) {
    $employee = Employee::find($employee_id);
    return view('employees', ['employee' => $employee]);
});