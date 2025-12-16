<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Payment extends Model {
    use HasFactory;

    protected $table = "payment";
    protected $primaryKey = "payment_id";

    public function sales(): BelongsTo {
        return $this->belongsTo(Sales::class, "sales_id");
    }
}