<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'customer_type_id',
        'customer_category_id',
        'description',
        'NPWP_number',
        'master_location_id',
        'address',
    ];

    // Relationships (optional)
    public function type()
    {
        return $this->belongsTo(CustomerType::class, 'customer_type_id');
    }

    public function location()
    {
        return $this->belongsTo(MasterSubdistrict::class, 'master_location_id');
    }

    public function category()
    {
        return $this->belongsTo(CustomerCategory::class, 'customer_category_id');
    }
}
