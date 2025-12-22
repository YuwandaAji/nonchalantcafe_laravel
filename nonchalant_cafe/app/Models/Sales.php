<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'sales_id';

    // Gabungkan semua kolom ke dalam SATU fillable saja
    protected $fillable = [
        'customer_id', 
        'payment_id', 
        'sales_status', 
        'pay_status'
    ];
}