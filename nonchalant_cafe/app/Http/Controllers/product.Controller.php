<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan Model Product sudah di-import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari table_product
        $products = Product::all(); 

        // Kirim variabel 'products' (jamak) ke view
        return view('customer.homepage', compact('products'));
    }
}