<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiaPaymentConfirmation extends Model
{
    protected $fillable = [
        'member_id',
        'member_name',
        'member_type',
        'member_email',
        'member_phone',
        'amount_to_pay',
        'notes',
        'status',
        'payment_method',
        'mobile_number',
        'mobile_account_name',
        'bank_name',
        'transaction_id',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'amount_to_pay' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function paymentRecord()
    {
        return $this->hasOne(FiaPaymentRecord::class, 'member_id', 'member_id');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('member_id', 'like', "%{$search}%")
              ->orWhere('member_name', 'like', "%{$search}%")
              ->orWhere('member_email', 'like', "%{$search}%");
        });
    }
}
