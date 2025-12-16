<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model {
    use HasFactory;

    protected $table = "sales";
    protected $primaryKey = "sales_id";

    public function customers(): BelongsTo {
        return $this->belongsTo(Customer::class, "customer_id");
    }

    public function feedbacks(): HasOne {
        return $this->hasOne(Feedback::class, "feedback_id");
    }

    public function payments(): HasOne {
        return $this->hasOne(Payment::class, "payment_id");
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class, "order_id");
    }
}