<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $guarded = [];
    protected $casts = ['started_at' => 'datetime', 'expires_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    /** Berakhir tepat di expires_at (tanpa masa tenggang). */
    public function isActive(): bool
    {
        return $this->expires_at && $this->expires_at->isFuture();
    }
}
