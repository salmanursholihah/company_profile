@extends('layouts.admin')
@section('title', 'Langganan & Tagihan')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<h5>Beri langganan manual</h5>
<form method="POST" action="{{ route('admin.subscriptions.grant') }}" class="row g-2 mb-4">
    @csrf
    <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email pelanggan" value="{{ old('email') }}" required></div>
    <div class="col-md-3">
        <select name="plan_id" class="form-control" required>
            @foreach ($plans as $p)<option value="{{ $p->id }}">{{ $p->name }} ({{ $p->duration_days }} hari)</option>@endforeach
        </select>
    </div>
    <div class="col-md-2"><input type="number" name="days" min="1" class="form-control" placeholder="Hari (opsional)"></div>
    <div class="col-md-3"><button class="btn btn-primary">Aktifkan / Perpanjang</button></div>
</form>

<h5>Langganan</h5>
<table class="table table-bordered mb-4">
    <thead><tr><th>Pelanggan</th><th>Paket</th><th>Mulai</th><th>Berakhir</th><th>Sumber</th><th>Status</th></tr></thead>
    <tbody>
        @forelse ($subscriptions as $s)
        <tr>
            <td>{{ $s->user->name ?? '-' }}<br><small class="text-muted">{{ $s->user->email ?? '' }}</small></td>
            <td>{{ $s->plan->name ?? '-' }}</td>
            <td>{{ $s->started_at?->format('d M Y') }}</td>
            <td>{{ $s->expires_at?->format('d M Y H:i') }}</td>
            <td>{{ $s->source === 'manual' ? 'Manual' : 'Pembayaran' }}</td>
            <td>{!! $s->isActive() ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Berakhir</span>' !!}</td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted">Belum ada langganan.</td></tr>
        @endforelse
    </tbody>
</table>

<h5>Tagihan terbaru</h5>
<table class="table table-bordered">
    <thead><tr><th>No. Tagihan</th><th>Pelanggan</th><th>Paket</th><th>Total</th><th>Bank</th><th>Status</th><th>Dibuat</th></tr></thead>
    <tbody>
        @forelse ($invoices as $i)
        <tr>
            <td>{{ $i->invoice_number }}</td>
            <td>{{ $i->user->name ?? '-' }}</td>
            <td>{{ $i->plan->name ?? '-' }}</td>
            <td>Rp {{ number_format((float) $i->total_amount, 0, ',', '.') }}</td>
            <td>{{ strtoupper($i->vaPayment->bank ?? '-') }}</td>
            <td>{{ ['pending' => 'Menunggu', 'paid' => 'Lunas', 'expired' => 'Kedaluwarsa', 'cancelled' => 'Dibatalkan'][$i->status] ?? $i->status }}</td>
            <td>{{ $i->created_at?->format('d M Y H:i') }}</td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada tagihan.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
