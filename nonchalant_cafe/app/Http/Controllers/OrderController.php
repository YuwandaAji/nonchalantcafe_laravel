<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
    $products = \App\Models\Product::all(); 
    return view('customer.shop', compact('products'));
}
    public function store(Request $request)
{
    DB::beginTransaction();
    try {
        // 1. Simpan ke tabel Sales
        $sales = new \App\Models\Sales();
        $sales->customer_id = 1; 
        $sales->payment_id = $request->payment_id;
        $sales->sales_status = 'New';
        $sales->pay_status = false;
        $sales->save();

        // --- PERBAIKAN DI SINI ---
        // Karena Primary Key kamu 'sales_id', maka panggil $sales->sales_id
        // Bukan $sales->id
        $newSalesId = $sales->sales_id; 

        // 2. Simpan setiap item ke tabel Order
        foreach ($request->items as $item) {
            DB::table('order')->insert([
                'sales_id' => $newSalesId, // Gunakan ID yang baru diambil
                'product_id' => $item['id'],
                'price' => $item['price'],
                'order_quantity' => $item['qty'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::commit();
        return response()->json([
            'message' => 'Pesanan berhasil disimpan!', 
            'sales_id' => $newSalesId
        ]);

    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['message' => 'Gagal: ' . $e->getMessage()], 500);
    }
}
}