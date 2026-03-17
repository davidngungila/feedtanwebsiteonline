<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingsTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'savings_account_id',
        'transaction_type',
        'amount',
        'balance_before',
        'balance_after',
        'description',
        'reference',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'balance_before' => 'decimal:2',
        'balance_after' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    public function savingsAccount()
    {
        return $this->belongsTo(SavingsAccount::class);
    }

    public function getIsDepositAttribute()
    {
        return $this->transaction_type === 'deposit';
    }

    public function getIsWithdrawalAttribute()
    {
        return $this->transaction_type === 'withdrawal';
    }

    public function getIsInterestAttribute()
    {
        return $this->transaction_type === 'interest';
    }

    public function getIsPenaltyAttribute()
    {
        return $this->transaction_type === 'penalty';
    }

    // Scopes
    public function scopeDeposit($query)
    {
        return $query->where('transaction_type', 'deposit');
    }

    public function scopeWithdrawal($query)
    {
        return $query->where('transaction_type', 'withdrawal');
    }

    public function scopeInterest($query)
    {
        return $query->where('transaction_type', 'interest');
    }

    public function scopePenalty($query)
    {
        return $query->where('transaction_type', 'penalty');
    }

    public function scopeByAccount($query, $accountId)
    {
        return $query->where('savings_account_id', $accountId);
    }

    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', now()->year);
    }

    public function scopeByAmountRange($query, $minAmount, $maxAmount = null)
    {
        if ($maxAmount) {
            return $query->whereBetween('amount', [$minAmount, $maxAmount]);
        }
        return $query->where('amount', '>=', $minAmount);
    }

    public function scopeByReference($query, $reference)
    {
        return $query->where('reference', 'like', "%{$reference}%");
    }
}
