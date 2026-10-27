@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
@php
    // Peta warna kartu statistik (nilai 'class' berasal dari AdminDashboardController)
    $tone = [
        'bg-primary' => ['t-blue',  '<path d="M21 8 12 3 3 8v8l9 5 9-5z"/><path d="m3 8 9 5 9-5M12 13v8"/>'],
        'bg-success' => ['t-green', '<path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v17H6.5A2.5 2.5 0 0 0 4 21.5z"/><path d="M20 19v3H6.5A2.5 2.5 0 0 1 4 19.5"/>'],
        'bg-info'    => ['t-cyan',  '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 0 0 5.4-5.4l-2.4 2.4-2.6-.6-.6-2.6z"/>'],
        'bg-warning' => ['t-amber', '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>'],
    ];
    $ico = fn ($p) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . $p . '</svg>';
    $hour = (int) now()->format('G');
    $greet = $hour < 11 ? 'Selamat pagi' : ($hour < 15 ? 'Selamat siang' : ($hour < 19 ? 'Selamat sore' : 'Selamat malam'));
@endphp

<div class="adm-hero">
    <h1>{{ $greet }}, {{ auth()->user()->name }} 👋</h1>
    <p>Ringkasan data terkini dari database {{ $site['brand_name'] }}.</p>
</div>

<div class="adm-stats">
    @foreach ($stats as $s)
        @php [$t, $p] = $tone[$s['class']] ?? ['t-blue', $tone['bg-primary'][1]]; @endphp
        <div class="adm-stat">
            <span class="adm-stat-ico {{ $t }}">{!! $ico($p) !!}</span>
            <div>
                <div class="adm-stat-val">{{ number_format($s['value'], 0, ',', '.') }}</div>
                <div class="adm-stat-lbl">{{ $s['label'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="adm-grid {{ $isSuperAdmin ? 'has-bar' : '' }}">
    @if ($isSuperAdmin)
        <section class="adm-panel">
            <h2>Pesan masuk (6 bulan terakhir)</h2>
            <div class="adm-chart"><canvas id="barChart"></canvas></div>
        </section>
    @endif

    <section class="adm-panel">
        <h2>Komposisi konten</h2>
        <div class="adm-chart sm"><canvas id="pieChart"></canvas></div>
    </section>
</div>

@if ($isSuperAdmin)
    <div class="adm-quick">
        <a href="{{ route('admin.katalogs.create') }}">{!! $ico('<path d="M12 5v14M5 12h14"/>') !!} Tambah Katalog</a>
        <a href="{{ route('admin.blogs.create') }}">{!! $ico('<path d="M12 5v14M5 12h14"/>') !!} Tulis Artikel</a>
        <a href="{{ route('admin.contacts.index') }}">{!! $ico('<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>') !!} Lihat Pesan</a>
        <a href="{{ route('admin.setting') }}">{!! $ico('<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3"/>') !!} Setting Situs</a>
    </div>
@endif
@endsection

@push('scripts')
<script src="{{ asset('assets/js/chart.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var css = getComputedStyle(document.documentElement);
    var brand = (css.getPropertyValue('--brand') || '').trim() || '#0f766e';
    var palette = [brand, '#16a34a', '#0891b2', '#f59e0b'];
    Chart.defaults.font.family = 'Inter, system-ui, sans-serif';
    Chart.defaults.color = '#64748b';

    @if ($isSuperAdmin)
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{ label: 'Pesan', data: @json($chartSeries), backgroundColor: brand, borderRadius: 8, maxBarThickness: 38 }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, ticks: { precision: 0 }, grid: { color: '#eef1f6' } }
            }
        }
    });
    @endif

    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: @json(array_keys($composition)),
            datasets: [{ data: @json(array_values($composition)), backgroundColor: palette, borderWidth: 3, borderColor: '#fff' }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '64%',
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8, padding: 14 } } }
        }
    });
});
</script>
@endpush
