<?php

namespace App\Services;

use App\Models\SubscriptionInvoice;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    /** Aktifkan/perpanjang langganan setelah invoice dibayar. */
    public function activateFromInvoice(SubscriptionInvoice $invoice): UserSubscription
    {
        return $this->extend($invoice->user, $invoice->plan, 'payment');
    }

    /** Beri langganan manual dari admin. */
    public function grantManual(User $user, SubscriptionPlan $plan, ?int $days = null): UserSubscription
    {
        $sub = $this->extend($user, $plan, 'manual', $days);
        app(NotificationService::class)->subscriptionGranted($user, $sub);

        return $sub;
    }

    protected function extend(User $user, ?SubscriptionPlan $plan, string $source, ?int $days = null): UserSubscription
    {
        $days = $days ?? ($plan->duration_days ?? 30);

        return DB::transaction(function () use ($user, $plan, $source, $days) {
            $sub = UserSubscription::where('user_id', $user->id)->lockForUpdate()->first();

            // Masih aktif -> sambung dari expires_at; sudah habis/baru -> mulai sekarang
            $from = ($sub && $sub->isActive()) ? $sub->expires_at->copy() : now();

            return UserSubscription::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'plan_id'    => $plan?->id,
                    'started_at' => ($sub && $sub->isActive()) ? $sub->started_at : now(),
                    'expires_at' => $from->copy()->addDays($days),
                    'source'     => $source,
                ]
            );
        });
    }

    /** Payload status langganan untuk API. */
    public function statusFor(User $user): array
    {
        $sub = $user->subscription()->with('plan')->first();

        $pending = $user->subscriptionInvoices()
            ->where('status', 'pending')
            ->where('due_at', '>', now())
            ->with(['plan', 'vaPayment'])
            ->first();

        $status = 'none';
        $days   = 0;
        if ($sub) {
            $status = $sub->isActive() ? 'active' : 'expired';
            $days   = $sub->isActive() ? (int) ceil(now()->floatDiffInDays($sub->expires_at)) : 0;
        }

        return [
            'status'         => $status,
            'is_active'      => $status === 'active',
            'days_remaining' => $days,
            'expires_at'     => $sub?->expires_at?->toIso8601String(),
            'plan'           => $sub?->plan ? [
                'id'   => $sub->plan->id,
                'name' => $sub->plan->name,
                'slug' => $sub->plan->slug,
            ] : null,
            'pending_invoice' => $pending ? app(InvoiceService::class)->payload($pending) : null,
        ];
    }
}
