<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionInvoice;
use App\Models\SubscriptionPlan;
use App\Services\InvoiceService;
use App\Services\SubscriptionService;
use App\Services\VaPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

/** Pendaftaran paket & pembayaran Virtual Account (Midtrans) lewat web; memakai service yang sama dengan API. */
class SubscriptionWebController extends Controller
{
    public function __construct(
        private SubscriptionService $subs,
        private InvoiceService $invoices,
        private VaPaymentService $va,
    ) {}

    // GET /langganan (publik)
    public function plans(Request $request)
    {
        $user = $request->user();

        // Tamu yang masuk/daftar dari sini akan kembali ke halaman paket
        if (! $user) {
            $request->session()->put('url.intended', route('subscription.plans'));
        }

        return view('langganan.plans', [
            'plans'  => SubscriptionPlan::where('is_active', true)->orderBy('sort_order')->orderBy('duration_days')->get(),
            'status' => $user ? $this->subs->statusFor($user) : null,
            'banks'  => config('subscription.banks'),
        ]);
    }

    // POST /langganan/pilih
    public function select(Request $request)
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
            Log::error('Gagal membuat VA langganan (web)', ['user' => $user->id, 'error' => $e->getMessage()]);
            if (isset($invoice)) {
                $invoice->update(['status' => 'cancelled']);
            }
            return back()->withInput()->with('error', 'Gagal membuat Virtual Account. Coba lagi beberapa saat.');
        }

        return redirect()->route('subscription.invoice', $invoice->invoice_number);
    }

    // GET /langganan/tagihan/{number}
    public function invoice(Request $request, string $number)
    {
        $invoice = $this->own($request, $number)->with(['plan', 'vaPayment'])->firstOrFail();

        // Sinkronkan dulu ke Midtrans bila masih menunggu (jaga-jaga webhook belum masuk)
        if ($invoice->status === 'pending' && $invoice->vaPayment) {
            $this->va->checkStatus($invoice->vaPayment);
            $invoice = $invoice->fresh(['plan', 'vaPayment']);
        }

        return view('langganan.invoice', ['i' => $this->invoices->payload($invoice)]);
    }

    // POST /langganan/tagihan/{number}/cek  (JSON, dipakai polling)
    public function check(Request $request, string $number)
    {
        $invoice = $this->own($request, $number)->with('vaPayment')->firstOrFail();
        abort_unless($invoice->vaPayment, 404);

        return response()->json(['payment_status' => $this->va->checkStatus($invoice->vaPayment)]);
    }

    // GET /langganan/tagihan
    public function history(Request $request)
    {
        $rows = $request->user()->subscriptionInvoices()->with(['plan', 'vaPayment'])->limit(50)->get()
            ->map(fn ($i) => $this->invoices->payload($i));

        return view('langganan.history', ['rows' => $rows, 'status' => $this->subs->statusFor($request->user())]);
    }

    protected function own(Request $request, string $number)
    {
        return SubscriptionInvoice::where('user_id', $request->user()->id)->where('invoice_number', $number);
    }
}
