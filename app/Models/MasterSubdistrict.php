<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSubdistrict extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'district_id',
        'name',
        'code',
        'postal_code',
    ];

    public function district()
    {
        return $this->belongsTo(MasterDistrict::class, 'district_id');
    }

    public function city()
    {
        return $this->district->city();
    }
}
