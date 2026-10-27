<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaPayment extends Model
{
    protected $guarded = [];
    protected $casts = [
        'amount'        => 'decimal:2',
        'bank_response' => 'array',
        'expired_at'    => 'datetime',
        'paid_at'       => 'datetime',
    ];

    public function invoice()
    {
        return $this->belongsTo(SubscriptionInvoice::class, 'invoice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function markAsPaid(?string $transactionId = null): void
    {
        $this->update([
            'status'         => 'paid',
            'transaction_id' => $transactionId ?? $this->transaction_id,
            'paid_at'        => now(),
        ]);
    }

    public function markAsExpired(): void
    {
        $this->update(['status' => 'expired']);
    }

    public function markAsCancelled(): void
    {
        $this->update(['status' => 'cancelled']);
    }
}
