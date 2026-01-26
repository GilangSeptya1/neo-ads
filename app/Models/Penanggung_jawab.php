<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penanggung_jawab extends Model
{
    protected $table = 'penanggung_jawab'; 
    protected $fillable = [
        'nama_depan_penanggungjawab',
        'nama_belakang_penanggungjawab',
        'email_penanggungjawab',
        'telepon_penanggungjawab'
    ];
}