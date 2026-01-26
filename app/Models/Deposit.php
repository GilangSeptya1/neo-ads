<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposit'; 
    
    protected $fillable = [
        'user_id',
        'jumlah',
        'metode_pembayaran',
        'status'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2'
    ];
}