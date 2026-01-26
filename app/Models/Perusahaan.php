<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan'; 
    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'kategori_bisnis',
        'jenis_perusahaan',
        'npwp',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat_lengkap',
        'nama_depan_penanggungjawab',
        'nama_belakang_penanggungjawab',
        'email_penanggungjawab',
        'telepon_penanggungjawab'
    ];
}