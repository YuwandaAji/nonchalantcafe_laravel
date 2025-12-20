<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('cashier')->group(function () {
    // Halaman Utama Kasir
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('cashier.dashboard');
    
    // Rute untuk update status pesanan (dari New ke Prepared)
    Route::patch('/order/{id}/process', [DashboardController::class, 'processOrder'])->name('cashier.process');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/customers', function () {
    return view('customers');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/payments', function () {
    return view('payments');
});

Route::get('/orders', function () {
    return view('orders');
});

Route::get('/feedbacks', function () {
    return view('feedbacks');
});

Route::get('/employees', function () {
    return view('employees', ['employees' => Employee::all()]);
});

Route::get('/employees/{employee_id}', function ($employee_id) {
    $employee = Employee::find($employee_id);
    return view('employees', ['employee' => $employee]);
});

Route::get('/account', [ProfileController::class, 'show'])->name('customer.profile')->middleware('auth:customer');

Route::middleware('auth:customer')->group(function () {
    Route::get('/account/edit', [ProfileController::class, 'edit'])->name('customer.edit');
    Route::put('/account/update', [ProfileController::class, 'update'])->name('customer.update');
});
