<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    // Tambahkan ini untuk menentukan nama tabel secara manual
    protected $table = 'iklan';
    
    protected $fillable = [
        'user_id',
        'judul_iklan',
        'target_lokasi',
        'tanggal_mulai',
        'tanggal_berakhir',
        'durasi_hari',
        'tujuan_iklan',
        'target_eksposur_km',
        'total_budget',
        'status'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
        'target_eksposur_km' => 'decimal:2',
        'total_budget' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(PembayaranIklan::class);
    }
}