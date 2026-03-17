<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'account_number',
        'type',
        'balance',
        'interest_rate',
        'status',
        'opening_date',
        'last_activity',
        'maturity_date'
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'opening_date' => 'datetime',
        'last_activity' => 'datetime',
        'maturity_date' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function transactions()
    {
        return $this->hasMany(SavingsTransaction::class);
    }

    public function deposits()
    {
        return $this->transactions()->where('transaction_type', 'deposit');
    }

    public function withdrawals()
    {
        return $this->transactions()->where('transaction_type', 'withdrawal');
    }

    public function getActiveAttribute()
    {
        return $this->status === 'active';
    }

    public function getTotalDepositsAttribute()
    {
        return $this->deposits()->sum('amount');
    }

    public function getTotalWithdrawalsAttribute()
    {
        return $this->withdrawals()->sum('amount');
    }

    public function getInterestEarnedAttribute()
    {
        if ($this->type === 'fixed' && $this->maturity_date) {
            $days = $this->opening_date->diffInDays(now());
            $dailyRate = $this->interest_rate / 100 / 365;
            return $this->balance * $dailyRate * $days;
        }
        
        $monthlyRate = $this->interest_rate / 100 / 12;
        $months = $this->opening_date->diffInMonths(now());
        return $this->balance * $monthlyRate * $months;
    }

    public function updateBalance($amount, $type)
    {
        if ($type === 'deposit') {
            $this->balance += $amount;
        } elseif ($type === 'withdrawal') {
            if ($this->balance >= $amount) {
                $this->balance -= $amount;
            } else {
                throw new \Exception('Insufficient balance');
            }
        }
        
        $this->last_activity = now();
        $this->save();
        
        return $this;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByMember($query, $memberId)
    {
        return $query->where('member_id', $memberId);
    }

    public function scopeDormant($query, $days = 365)
    {
        return $query->where('last_activity', '<', now()->subDays($days));
    }
}
