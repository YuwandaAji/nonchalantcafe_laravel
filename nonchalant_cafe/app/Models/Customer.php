<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model {
    use HasFactory;

    protected $table = "customer";
    protected $primaryKey = "customer_id";

    public function sales(): HasMany {
        return $this->hasMany(Sales::class, "sales_id");
    }
    public function sales(){
    // customer_id adalah primary key di table_customers.php
    return $this->hasMany(Sales::class, 'customer_id', 'customer_id');
}
}