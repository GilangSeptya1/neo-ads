<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerUser extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'customer_id',
        'user_id',
    ];


    // Relation to Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
