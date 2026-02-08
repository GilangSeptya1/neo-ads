<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'province_id',
        'name',
        'code',
    ];

    public function province()
    {
        return $this->belongsTo(MasterProvince::class, 'province_id');
    }
}

