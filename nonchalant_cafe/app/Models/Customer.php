<?php

namespace App\Models;

// Menggunakan Authenticatable agar model ini bisa login
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable 
{
    use HasFactory, Notifiable;

    protected $table = "customer";
    protected $primaryKey = "customer_id";

    /**
     * Mengarahkan Laravel ke kolom password yang benar
     */
    public function getAuthPassword()
    {
        // Menggunakan kolom customer_password dari database
        return $this->customer_password;
    }

    /**
     * Relasi ke tabel Sales
     */
    public function sales(): HasMany 
    {
        // Menghubungkan customer_id di tabel customer ke customer_id di tabel sales
        return $this->hasMany(Sales::class, 'customer_id', 'customer_id');
    }

    protected $fillable = [
        'customer_name', 
        'customer_email', 
        'customer_password', 
        'customer_address', 
        'customer_number',
        'customer_dateborn',
        'customer_img'
    ];
}