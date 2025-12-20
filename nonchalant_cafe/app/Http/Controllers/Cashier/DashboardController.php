<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    // Mengambil data sales beserta detail order dan produknya
    $orders = Sales::with(['customer', 'payment'])->where('sales_status', 'New')->get();
    return view('cashier.dashboard', compact('orders'));
}
    public function processOrder($id)
    {
        $sale = Sales::findOrFail($id);
        // Mengubah status menjadi 'Prepared' sesuai spesifikasi enum
        $sale->update(['sales_status' => 'Prepared']);

        return redirect()->back()->with('success', 'Pesanan sedang disiapkan!');
    }
}
