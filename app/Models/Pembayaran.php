<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran'; 
    
    protected $fillable = [
        'iklan_id',
        'user_id',
        'jumlah',
        'status'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_pembayaran' => 'datetime'
    ];

    public function iklan()
    {
        return $this->belongsTo(Iklan::class);
    }
}