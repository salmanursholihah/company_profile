<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;
use App\Services\NotificationService;
use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function __construct(private SubscriptionService $subs) {}

    // POST /api/v1/midtrans/callback  (tanpa auth; diverifikasi signature)
    public function handle(): JsonResponse
    {
        $cb      = new CallbackService();
        $invoice = $cb->getInvoice();

        if (! $invoice) {
            Log::warning('Midtrans callback: invoice tidak ditemukan', ['order_id' => $cb->getNotification()->order_id ?? null]);
            return response()->json(['message' => 'Invoice tidak ditemukan'], 404);
        }

        if (! $cb->isSignatureKeyVerified()) {
            Log::warning('Midtrans callback: signature tidak valid', ['invoice' => $invoice->invoice_number]);
            return response()->json(['message' => 'Signature tidak valid'], 403);
        }

        $va = $invoice->vaPayment;

        if ($cb->isSuccess()) {
            if (! $invoice->isPaid()) {
                $va?->markAsPaid($cb->getNotification()->transaction_id ?? null);
                $invoice->markAsPaid();
                $sub = $this->subs->activateFromInvoice($invoice);
                app(NotificationService::class)->paymentSuccess($invoice, $sub);
            }
        } elseif ($cb->isExpire()) {
            if (! $invoice->isPaid()) {
                $invoice->markAsExpired();
                $va?->markAsExpired();
                app(NotificationService::class)->paymentExpired($invoice);
            }
        } elseif ($cb->isCancelled()) {
            if (! $invoice->isPaid()) {
                $invoice->update(['status' => 'cancelled']);
                $va?->markAsCancelled();
            }
        }

        return response()->json(['message' => 'OK']);
    }
}
