<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionInvoice;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscription;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions.index', [
            'subscriptions' => UserSubscription::with(['user', 'plan'])->orderByDesc('expires_at')->limit(100)->get(),
            'invoices'      => SubscriptionInvoice::with(['user', 'plan', 'vaPayment'])->latest()->limit(100)->get(),
            'plans'         => SubscriptionPlan::orderBy('duration_days')->get(),
        ]);
    }

    // POST: beri langganan manual (mis. promo / pembayaran di luar aplikasi)
    public function grant(Request $request, SubscriptionService $subs)
    {
        $data = $request->validate([
            'email'   => 'required|email|exists:users,email',
            'plan_id' => 'required|exists:subscription_plans,id',
            'days'    => 'nullable|integer|min:1|max:3650',
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();
        $plan = SubscriptionPlan::findOrFail($data['plan_id']);

        $sub = $subs->grantManual($user, $plan, $data['days'] ?? null);

        return redirect()->route('admin.subscriptions.index')
            ->with('success', "Langganan {$user->name} aktif sampai " . $sub->expires_at->format('d M Y H:i') . '.');
    }
}
