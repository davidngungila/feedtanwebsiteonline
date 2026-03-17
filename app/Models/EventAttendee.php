<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'member_id',
        'registration_status',
        'registration_date',
        'fee_paid',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
        'fee_paid' => 'decimal:2',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function getIsRegisteredAttribute()
    {
        return $this->registration_status === 'registered';
    }

    public function getHasAttendedAttribute()
    {
        return $this->registration_status === 'attended';
    }

    public function getIsCancelledAttribute()
    {
        return $this->registration_status === 'cancelled';
    }

    // Scopes
    public function scopeRegistered($query)
    {
        return $query->where('registration_status', 'registered');
    }

    public function scopeAttended($query)
    {
        return $query->where('registration_status', 'attended');
    }

    public function scopeCancelled($query)
    {
        return $query->where('registration_status', 'cancelled');
    }

    public function scopeByEvent($query, $eventId)
    {
        return $query->where('event_id', $eventId);
    }

    public function scopeByMember($query, $memberId)
    {
        return $query->where('member_id', $memberId);
    }

    public function scopePaid($query)
    {
        return $query->where('fee_paid', '>', 0);
    }

    public function scopeFree($query)
    {
        return $query->where('fee_paid', 0);
    }

    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('registration_date', [$startDate, $endDate]);
    }
}
