<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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