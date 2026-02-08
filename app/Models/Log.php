<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'event',
        'ip_address',
        'user_agent',
        'url',
        'method',
    ];

    protected $casts = [
        'properties' => 'array',
        'created_at' => 'datetime',
    ];

    /**
     * Get the subject model (polymorphic)
     */
    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * Get the causer model (polymorphic)
     */
    public function causer()
    {
        return $this->morphTo();
    }

    /**
     * Scope for specific log name
     */
    public function scopeInLog($query, $logName)
    {
        return $query->where('log_name', $logName);
    }

    /**
     * Scope for specific event
     */
    public function scopeForEvent($query, $event)
    {
        return $query->where('event', $event);
    }

    /**
     * Scope for caused by specific user
     */
    public function scopeCausedBy($query, $causer)
    {
        return $query->where('causer_type', get_class($causer))
                     ->where('causer_id', $causer->id);
    }
}