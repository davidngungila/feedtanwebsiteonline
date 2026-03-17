<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'loan_id',
        'amount',
        'type',
        'term',
        'interest_rate',
        'status',
        'purpose',
        'application_date',
        'approval_date',
        'disbursement_date',
        'due_date',
        'collateral'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'application_date' => 'datetime',
        'approval_date' => 'datetime',
        'disbursement_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function payments()
    {
        return $this->hasMany(LoanPayment::class);
    }

    public function getRemainingBalanceAttribute()
    {
        $totalPaid = $this->payments()->sum('amount');
        return $this->amount - $totalPaid;
    }

    public function getIsOverdueAttribute()
    {
        return $this->status === 'disbursed' && 
               $this->due_date && 
               $this->due_date->isPast() && 
               $this->remaining_balance > 0;
    }

    public function getNextPaymentDueAttribute()
    {
        if ($this->status !== 'disbursed') {
            return null;
        }

        $monthlyPayment = $this->amount / $this->term;
        $paidCount = $this->payments()->count();
        $nextDueDate = $this->disbursement_date->addMonths($paidCount + 1);
        
        return [
            'amount' => $monthlyPayment,
            'date' => $nextDueDate,
            'is_overdue' => $nextDueDate->isPast()
        ];
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['approved', 'disbursed']);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'disbursed')
                    ->where('due_date', '<', now())
                    ->whereHas('payments', function ($q) {
                        $q->havingRaw('SUM(amount) < loans.amount');
                    });
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByMember($query, $memberId)
    {
        return $query->where('member_id', $memberId);
    }
}
