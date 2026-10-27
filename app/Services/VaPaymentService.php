<?php

namespace App\Services;

use App\Models\SubscriptionInvoice;
use App\Models\VaPayment;
use App\Services\Midtrans\CreateVAService;
use App\Services\Midtrans\Midtrans;
use Midtrans\Transaction;

class VaPaymentService
{
    public function createVa(SubscriptionInvoice $invoice, string $bank): VaPayment
    {
        return (new CreateVAService($invoice, $bank))->getVA();
    }

    /** Cek langsung ke Midtrans; sinkronkan status & aktifkan langganan bila lunas. */
    public function checkStatus(VaPayment $va): string
    {
        new Midtrans();

        $invoice = $va->invoice;

        try {
            $r = Transaction::status($invoice->invoice_number);
        } catch (\Throwable $e) {
            // 404 dari Midtrans = belum ada transaksi / belum dibayar
            return $this->localStatus($va);
        }

        $trx   = $r->transaction_status ?? '';
        $fraud = $r->fraud_status ?? 'accept';

        if (in_array($trx, ['capture', 'settlement'], true) && $fraud === 'accept') {
            if (! $invoice->isPaid()) {
                $va->markAsPaid($r->transaction_id ?? null);
                $invoice->markAsPaid();
                $fresh = $invoice->fresh(['user', 'plan']);
                $sub   = app(SubscriptionService::class)->activateFromInvoice($fresh);
                app(\App\Services\NotificationService::class)->paymentSuccess($fresh, $sub);
            }
            return 'paid';
        }
        if ($trx === 'expire') {
            $va->markAsExpired();
            $invoice->markAsExpired();
            app(\App\Services\NotificationService::class)->paymentExpired($invoice);
            return 'expired';
        }
        if (in_array($trx, ['cancel', 'deny'], true)) {
            $va->markAsCancelled();
            $invoice->update(['status' => 'cancelled']);
            return 'cancelled';
        }

        return $this->localStatus($va);
    }

    protected function localStatus(VaPayment $va): string
    {
        if ($va->status === 'pending' && $va->expired_at && $va->expired_at->isPast()) {
            return 'expired';
        }
        return $va->status;
    }
}
