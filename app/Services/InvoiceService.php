<?php

namespace App\Services;

use App\Models\SubscriptionInvoice;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Str;

class InvoiceService
{
    public function createForPlan(User $user, SubscriptionPlan $plan): SubscriptionInvoice
    {
        // Tagihan pending lama dibatalkan agar tidak menumpuk
        SubscriptionInvoice::where('user_id', $user->id)
            ->where('status', 'pending')
            ->update(['status' => 'cancelled']);

        return SubscriptionInvoice::create([
            'invoice_number' => $this->number(),
            'user_id'        => $user->id,
            'plan_id'        => $plan->id,
            'total_amount'   => $plan->price,
            'status'         => 'pending',
            'due_at'         => now()->addHours((int) config('subscription.va_expiry_hours', 24)),
        ]);
    }

    protected function number(): string
    {
        do {
            $n = config('subscription.invoice_prefix', 'GUIDE') . '-' . now()->format('ymd') . '-' . strtoupper(Str::random(6));
        } while (SubscriptionInvoice::where('invoice_number', $n)->exists());

        return $n;
    }

    /** Bentuk respons API untuk satu invoice (+VA bila ada). */
    /** URL gambar QR (PNG) dari actions respons Midtrans. */
    protected function qrUrl(?array $resp): ?string
    {
        foreach ($resp['actions'] ?? [] as $a) {
            if (($a['name'] ?? '') === 'generate-qr-code') {
                return $a['url'] ?? null;
            }
        }
        foreach ($resp['actions'] ?? [] as $a) {
            if (str_starts_with($a['name'] ?? '', 'generate-qr-code')) {
                return $a['url'] ?? null;
            }
        }
        return null;
    }

    public function payload(SubscriptionInvoice $invoice): array
    {
        $invoice->loadMissing(['plan', 'vaPayment']);
        $va = $invoice->vaPayment;

        return [
            'invoice_number' => $invoice->invoice_number,
            'plan_name'      => $invoice->plan->name ?? '-',
            'total_amount'   => (int) round((float) $invoice->total_amount),
            'status'         => $invoice->status,
            'due_at'         => $invoice->due_at?->toIso8601String(),
            'paid_at'        => $invoice->paid_at?->toIso8601String(),
            'va'             => $va ? [
                'qr_url'      => $va->bank === 'qris' ? $this->qrUrl($va->bank_response) : null,
                'qr_string'   => $va->bank === 'qris' ? ($va->bank_response['qr_string'] ?? null) : null,
                'bank'        => $va->bank,
                'va_number'   => $va->va_number,
                'va_name'     => $va->va_name,
                'biller_code' => $va->biller_code,
                'amount'      => (int) round((float) $va->amount),
                'expired_at'  => $va->expired_at?->toIso8601String(),
            ] : null,
        ];
    }
}
