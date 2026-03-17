<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'is_online',
        'meeting_link',
        'start_date',
        'end_date',
        'max_attendees',
        'fee',
        'status',
        'image',
    ];

    protected $casts = [
        'is_online' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'fee' => 'decimal:2',
        'max_attendees' => 'integer',
    ];

    public function attendees()
    {
        return $this->hasMany(EventAttendee::class);
    }

    public function getRegisteredAttendeesCountAttribute()
    {
        return $this->attendees()->where('registration_status', 'registered')->count();
    }

    public function getAttendedCountAttribute()
    {
        return $this->attendees()->where('registration_status', 'attended')->count();
    }

    public function getTotalFeesCollectedAttribute()
    {
        return $this->attendees()->sum('fee_paid');
    }

    public function getIsFullAttribute()
    {
        return $this->max_attendees && $this->registered_attendees_count >= $this->max_attendees;
    }

    public function getIsUpcomingAttribute()
    {
        return $this->start_date->isFuture();
    }

    public function getIsOngoingAttribute()
    {
        $now = now();
        return $this->start_date->isPast() && $this->end_date->isFuture();
    }

    public function getIsCompletedAttribute()
    {
        return $this->end_date->isPast();
    }

    // Scopes
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now());
    }

    public function scopePast($query)
    {
        return $query->where('end_date', '<', now());
    }

    public function scopeOngoing($query)
    {
        return $query->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeFree($query)
    {
        return $query->where('fee', 0);
    }

    public function scopePaid($query)
    {
        return $query->where('fee', '>', 0);
    }

    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    public function scopeOffline($query)
    {
        return $query->where('is_online', false);
    }
}
