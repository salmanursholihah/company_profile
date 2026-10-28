@extends('layouts.app_landing')

@section('content')
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Riwayat Tagihan</h1>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('subscription.plans') }}">Langganan</a></li>
                <li class="current">Riwayat</li>
            </ol></nav>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <p>
                Status langganan:
                @if($status['is_active'])
                    <span class="badge text-bg-success">Aktif, sisa {{ $status['days_remaining'] }} hari</span>
                @else
                    <span class="badge text-bg-secondary">{{ $status['status'] === 'expired' ? 'Berakhir' : 'Belum berlangganan' }}</span>
                @endif
            </p>
            <div class="table-responsive bg-white border rounded-3">
                <table class="table mb-0 align-middle">
                    <thead><tr><th>No. Tagihan</th><th>Paket</th><th>Total</th><th>Status</th><th></th></tr></thead>
                    <tbody>
                    @forelse($rows as $r)
                        <tr>
                            <td>{{ $r['invoice_number'] }}</td>
                            <td>{{ $r['plan_name'] }}</td>
                            <td>Rp {{ number_format($r['total_amount'], 0, ',', '.') }}</td>
                            <td>{{ ['pending'=>'Menunggu','paid'=>'Lunas','expired'=>'Kedaluwarsa','cancelled'=>'Dibatalkan'][$r['status']] ?? $r['status'] }}</td>
                            <td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('subscription.invoice', $r['invoice_number']) }}">Detail</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada tagihan.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
