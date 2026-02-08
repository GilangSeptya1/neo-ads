<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'title',
        'goal_type',
        'sticker_area_type',
        'target_location_id',
        'target_distance',
        'target_partner',
        'total_budget',
        'startdate',
        'enddate',
        'duration',
        'status',
        'description',
        'remarks',
        'draft_at',
        'on_review_at',
        'searching_partner_at',
        'start_at',
        'completed_at',
        'cancel_at',
    ];

    protected $casts = [
        'startdate' => 'date',
        'enddate'   => 'date',
        'total_budget' => 'decimal:2',
        'draft_at' => 'datetime',
        'on_review_at' => 'datetime',
        'searching_partner_at' => 'datetime',
        'start_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancel_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function location()
    {
        return $this->belongsTo(MasterCity::class, 'target_location_id');
    }
}
