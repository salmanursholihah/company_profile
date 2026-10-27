<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Katalog;
use App\Models\Service;

/** Dashboard admin dengan angka nyata dari database (sebelumnya angka contoh dari template). */
class AdminDashboardController extends Controller
{
    public function index()
    {
        // Blogger hanya boleh memakai fitur blog -> tidak punya dashboard
        if (auth()->user()?->role === 'blogger') {
            return redirect()->route('admin.blogs.index');
        }

        $isSuperAdmin = auth()->user()?->role === 'super_admin';

        $stats = [
            ['label' => 'Produk (Katalog)', 'value' => Katalog::count(),  'class' => 'bg-primary'],
            ['label' => 'Artikel',          'value' => Blog::count(),     'class' => 'bg-success'],
            ['label' => 'Layanan',          'value' => Service::count(),  'class' => 'bg-info'],
        ];
        if ($isSuperAdmin) {
            $stats[] = ['label' => 'Pesan masuk', 'value' => Contact::count(), 'class' => 'bg-warning'];
        }

        // Pesan masuk 6 bulan terakhir (hanya super admin yang melihat pesan)
        $labels = [];
        $series = [];
        if ($isSuperAdmin) {
            $start = now()->startOfMonth()->subMonths(5);
            $byMonth = Contact::where('created_at', '>=', $start)->get(['created_at'])
                ->groupBy(fn ($c) => $c->created_at->format('Y-m'))
                ->map->count();

            for ($i = 0; $i < 6; $i++) {
                $m = $start->copy()->addMonths($i);
                $labels[] = $m->format('M Y');
                $series[] = (int) ($byMonth[$m->format('Y-m')] ?? 0);
            }
        }

        return view('admin.dashboard', [
            'stats'        => $stats,
            'isSuperAdmin' => $isSuperAdmin,
            'chartLabels'  => $labels,
            'chartSeries'  => $series,
            'composition'  => collect($stats)->pluck('value', 'label')->all(),
        ]);
    }
}
