<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Presence extends Model {
    use HasFactory;

    protected $table = "presence";
    protected $primaryKey = "presence_id";

    public function employees():BelongsTo {
        return $this->belongsTo(Employee::class, "employee_id");
    }
}