<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::orderBy('sort_order')->orderBy('duration_days')->get();

        return view('admin.subscription-plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.subscription-plans.form', [
            'plan' => new SubscriptionPlan(['is_active' => true, 'duration_days' => 30]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        SubscriptionPlan::create($data);

        return redirect()->route('admin.subscription-plans.index')->with('success', 'Paket ditambahkan.');
    }

    public function edit(SubscriptionPlan $plan)
    {
        return view('admin.subscription-plans.form', compact('plan'));
    }

    public function update(Request $request, SubscriptionPlan $plan)
    {
        $plan->update($this->validated($request));

        return redirect()->route('admin.subscription-plans.index')->with('success', 'Paket diperbarui.');
    }

    public function destroy(SubscriptionPlan $plan)
    {
        $plan->delete(); // invoice & langganan lama tetap ada (plan_id -> null)

        return redirect()->route('admin.subscription-plans.index')->with('success', 'Paket dihapus.');
    }

    protected function validated(Request $r): array
    {
        $d = $r->validate([
            'name'          => 'required|string|max:100',
            'description'   => 'nullable|string|max:500',
            'duration_days' => 'required|integer|min:1|max:3650',
            'price'         => 'required|numeric|min:1000',
            'sort_order'    => 'nullable|integer|min:0',
        ]);
        $d['sort_order'] = $d['sort_order'] ?? 0;
        $d['is_popular'] = $r->boolean('is_popular');
        $d['is_active']  = $r->boolean('is_active');

        return $d;
    }

    protected function uniqueSlug(string $name): string
    {
        $base = Str::slug($name) ?: 'paket';
        $slug = $base;
        $i = 2;
        while (SubscriptionPlan::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
