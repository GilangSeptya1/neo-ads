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

    public function getEmailAttribute()
    {
        return $this->user?->email;
    }

    // mutator to set phone number to remove any non-digit characters
    // if begin with 0 replace with country code 62
    public function setPhoneAttribute($value)
    {
        $phone = preg_replace('/\D/', '', $value);
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }
        $this->attributes['phone'] = $phone;
    }
}
