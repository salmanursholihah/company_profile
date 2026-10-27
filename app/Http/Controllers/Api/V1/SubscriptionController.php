<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SubscriptionInvoice;
use App\Models\SubscriptionPlan;
use App\Services\InvoiceService;
use App\Services\SubscriptionService;
use App\Services\VaPaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class SubscriptionController extends ApiController
{
    public function __construct(
        private SubscriptionService $subs,
        private InvoiceService $invoices,
        private VaPaymentService $va,
    ) {}

    // GET /subscriptions/plans
    public function plans(): JsonResponse
    {
        $rows = SubscriptionPlan::where('is_active', true)
            ->orderBy('sort_order')->orderBy('duration_days')->get()
            ->map(fn ($p) => [
                'id'            => $p->id,
                'name'          => $p->name,
                'slug'          => $p->slug,
                'description'   => $p->description,
                'duration_days' => $p->duration_days,
                'price'         => (int) round((float) $p->price),
                'price_label'   => $p->price_label,
                'is_popular'    => $p->is_popular,
                'saving_label'  => $p->saving_label,
            ]);

        return $this->ok($rows);
    }

    // GET /subscriptions/status
    public function status(Request $request): JsonResponse
    {
        return $this->ok($this->subs->statusFor($request->user()));
    }

    // POST /subscriptions/select {plan_slug, bank}
    public function select(Request $request): JsonResponse
    {
        $data = $request->validate([
            'plan_slug' => ['required', 'string', Rule::exists('subscription_plans', 'slug')->where('is_active', true)],
            'bank'      => ['required', Rule::in(config('subscription.banks'))],
        ]);

        $user = $request->user();
        $plan = SubscriptionPlan::where('slug', $data['plan_slug'])->firstOrFail();

        try {
            $invoice = DB::transaction(fn () => $this->invoices->createForPlan($user, $plan));
            $this->va->createVa($invoice, $data['bank']);
        } catch (\Throwable $e) {
            Log::error('Gagal membuat VA langganan', ['user' => $user->id, 'error' => $e->getMessage()]);
            if (isset($invoice)) {
                $invoice->update(['status' => 'cancelled']);
            }
            return $this->fail('Gagal membuat Virtual Account. Coba lagi beberapa saat.', 502);
        }

        return $this->ok($this->invoices->payload($invoice->fresh(['plan', 'vaPayment'])), 'Virtual Account berhasil dibuat.', 201);
    }

    // POST /subscriptions/check-va {invoice_number?}
    public function checkVa(Request $request): JsonResponse
    {
        $user = $request->user();

        $q = SubscriptionInvoice::where('user_id', $user->id)->with('vaPayment');
        $request->filled('invoice_number')
            ? $q->where('invoice_number', $request->input('invoice_number'))
            : $q->latest('id');

        $invoice = $q->first();

        if (! $invoice || ! $invoice->vaPayment) {
            return $this->fail('Tagihan tidak ditemukan.', 404);
        }

        $paymentStatus = $this->va->checkStatus($invoice->vaPayment);

        return $this->ok([
            'payment_status' => $paymentStatus,
            'invoice'        => $this->invoices->payload($invoice->fresh(['plan', 'vaPayment'])),
            'subscription'   => $this->subs->statusFor($user->fresh()),
        ]);
    }

    // GET /subscriptions/invoices
    public function invoices(Request $request): JsonResponse
    {
        $rows = $request->user()->subscriptionInvoices()->with(['plan', 'vaPayment'])->limit(50)->get()
            ->map(fn ($i) => $this->invoices->payload($i));

        return $this->ok($rows);
    }
}
