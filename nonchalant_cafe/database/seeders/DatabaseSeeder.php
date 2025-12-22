<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Isi Data Produk (Menu Kopi)
        DB::table('product')->insert([
    // --- CATEGORY: COFFE ---
    [
        'product_name' => 'Americano',
        'product_price' => 25000,
        'product_category' => 'Coffe',
        'product_size' => 'Medium',
        'product_stock' => 100,
        'product_description' => 'Espresso dengan air panas.',
        'created_at' => now(),
    ],
    [
        'product_name' => 'Latte',
        'product_price' => 32000,
        'product_category' => 'Coffe',
        'product_size' => 'Medium',
        'product_stock' => 50,
        'product_description' => 'Espresso dengan susu creamy.',
        'created_at' => now(),
    ],
    [
        'product_name' => 'Cappuccino', // Ini dia yang ditunggu
        'product_price' => 30000,
        'product_category' => 'Coffe',
        'product_size' => 'Medium',
        'product_stock' => 50,
        'product_description' => 'Espresso dengan susu foam yang lembut dan seimbang.',
        'created_at' => now(),
    ],

    // --- CATEGORY: SNACK ---
    [
        'product_name' => 'Croissant',
        'product_price' => 18000,
        'product_category' => 'Snack',
        'product_size' => 'Medium',
        'product_stock' => 30,
        'product_description' => 'Pastry renyah khas Perancis.',
        'created_at' => now(),
    ],
    [
        'product_name' => 'Waffles',
        'product_price' => 22000,
        'product_category' => 'Snack',
        'product_size' => 'Medium',
        'product_stock' => 25,
        'product_description' => 'Waffle hangat dengan topping.',
        'created_at' => now(),
    ],

    // --- CATEGORY: SIGNATURE ---
    [
        'product_name' => 'Nonchawidch',
        'product_price' => 45000,
        'product_category' => 'Signature',
        'product_size' => 'Large',
        'product_stock' => 20,
        'product_description' => 'Sandwich spesial resep rahasia.',
        'created_at' => now(),
    ],
    ]);

        // 2. Isi Data Customer (Agar transaksi tidak error)
        DB::table('customer')->insert([
            'customer_id' => 1,
            'customer_name' => 'Tamu Pertama',
            'customer_email' => 'tamu@gmail.com',
            'customer_password' => Hash::make('password123'),
            'created_at' => now(),
        ]);

        // 3. Isi Data Payment (Metode Pembayaran)
        DB::table('payment')->insert([
            'payment_id' => 1,
            'payment_name' => 'Tunai / Cash',
            'payment_category' => 'COC',
            'payment_status' => true,
            'created_at' => now(),
        ]);
    }
}