<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model {
    use HasFactory;
    protected $fillable = ["product_id", "product_name","product_price","product_category","product_size","product_stock",'product_description'];
    protected $table = "product";
    protected $primaryKey = "product_id";

    public function orders(): HasMany {
        return $this->hasMany(Order::class, "order_id");
    }

    public function discounts(): BelongsToMany {
        return $this->belongsToMany(Discount::class, "discount", "discount_id");
    }
}