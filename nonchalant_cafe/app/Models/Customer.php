<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Penting: Harus Authenticatable
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customer'; // Nama tabel Anda
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_name', 'customer_email', 'customer_password',
    ];

    protected $hidden = [
        'customer_password',
    ];

    // Beritahu Laravel kalau kolom password Anda namanya customer_password
    public function getAuthPassword()
    {
        return $this->customer_password;
    }
}