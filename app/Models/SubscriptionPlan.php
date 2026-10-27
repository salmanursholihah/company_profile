<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $guarded = [];
    protected $casts = [
        'price'      => 'decimal:2',
        'is_popular' => 'boolean',
        'is_active'  => 'boolean',
    ];

    public function getPriceLabelAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->price, 0, ',', '.');
    }

    /** Label hemat dibanding membeli paket bulanan berulang. */
    public function getSavingLabelAttribute(): ?string
    {
        $monthly = static::where('is_active', true)->where('duration_days', '<=', 31)->orderBy('duration_days')->first();
        if (! $monthly || $this->duration_days <= 31 || (float) $monthly->price <= 0) {
            return null;
        }
        $months  = $this->duration_days / 30;
        $normal  = (float) $monthly->price * $months;
        $percent = (int) round((1 - ((float) $this->price / $normal)) * 100);

        return $percent >= 5 ? "Hemat {$percent}%" : null;
    }
}
