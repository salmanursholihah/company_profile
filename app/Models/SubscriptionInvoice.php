<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionInvoice extends Model
{
    protected $guarded = [];
    protected $casts = [
        'total_amount' => 'decimal:2',
        'due_at'       => 'datetime',
        'paid_at'      => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function vaPayment()
    {
        return $this->hasOne(VaPayment::class, 'invoice_id');
    }

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending' && $this->due_at && $this->due_at->isFuture();
    }

    public function markAsPaid(): void
    {
        $this->update(['status' => 'paid', 'paid_at' => now()]);
    }

    public function markAsExpired(): void
    {
        $this->update(['status' => 'expired']);
    }
}
