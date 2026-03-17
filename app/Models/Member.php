<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\SavingsAccount;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Transaction;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'name',
        'email',
        'phone',
        'address',
        'member_type',
        'status',
        'registration_date',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function savingsAccounts()
    {
        return $this->hasMany(SavingsAccount::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function getActiveAttribute()
    {
        return $this->status === 'active';
    }

    public function getTotalSavingsAttribute()
    {
        return $this->savingsAccounts()->sum('balance');
    }

    public function getTotalLoansAttribute()
    {
        return $this->loans()->where('status', '!=', 'completed')->sum('amount');
    }
}
