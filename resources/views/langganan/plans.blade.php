@extends('layouts.app_landing')

@push('styles')
<style>
    .plan-card{position:relative;border:1px solid rgba(0,0,0,.1);border-radius:16px;background:#fff;padding:1.5rem;height:100%;display:flex;flex-direction:column}
    .plan-card.popular{border:2px solid var(--accent-color,#0d6efd);box-shadow:0 8px 28px rgba(0,0,0,.08)}
    .plan-badge{position:absolute;top:-12px;left:1.5rem;background:var(--accent-color,#0d6efd);color:#fff;font-size:.75rem;padding:.2rem .7rem;border-radius:999px}
    .plan-price{font-size:1.9rem;font-weight:800}
</style>
@endpush

@section('content')
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Paket Langganan</h1>
            <p>Buka seluruh materi panduan premium. Bayar mudah lewat QRIS atau Virtual Account bank.</p>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="current">Langganan</li>
            </ol></nav>
        </div>
    </div>

    <section class="section">
        <div class="container">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

            @auth
                @if($status['is_active'])
                    <div class="alert alert-success">
                        Langganan aktif ({{ $status['plan']['name'] ?? 'Paket' }}), sisa {{ $status['days_remaining'] }} hari,
                        berlaku sampai {{ \Carbon\Carbon::parse($status['expires_at'])->translatedFormat('d F Y') }}.
                        Membeli lagi akan memperpanjang masa aktif.
                    </div>
                @elseif($status['status'] === 'expired')
                    <div class="alert alert-warning">Langganan Anda sudah berakhir. Pilih paket untuk mengaktifkannya kembali.</div>
                @endif
                @if($status['pending_invoice'])
                    <div class="alert alert-info">
                        Ada tagihan yang belum dibayar.
                        <a href="{{ route('subscription.invoice', $status['pending_invoice']['invoice_number']) }}">Lihat tagihan</a>
                    </div>
                @endif
            @else
                <div class="alert alert-info d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <span>Untuk berlangganan, daftar atau masuk ke akun Anda terlebih dahulu.</span>
                    <span><a class="btn btn-primary btn-sm" href="{{ route('register') }}">Daftar</a>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('login') }}">Masuk</a></span>
                </div>
            @endauth

            <div class="row g-4 justify-content-center mt-1">
                @forelse($plans as $p)
                    <div class="col-md-6 col-lg-4">
                        <div class="plan-card {{ $p->is_popular ? 'popular' : '' }}">
                            @if($p->is_popular)<span class="plan-badge">Terpopuler</span>@endif
                            <h4>{{ $p->name }}</h4>
                            <div class="plan-price">{{ $p->price_label }}</div>
                            <div class="text-muted small mb-2">untuk {{ $p->duration_days }} hari @if($p->saving_label)· <span class="text-success fw-semibold">{{ $p->saving_label }}</span>@endif</div>
                            <p class="small flex-grow-1">{{ $p->description }}</p>

                            @auth
                                <form method="post" action="{{ route('subscription.select') }}">
                                    @csrf
                                    <input type="hidden" name="plan_slug" value="{{ $p->slug }}">
                                    <label class="form-label small mb-1">Bayar dengan</label>
                                    <select name="bank" class="form-select mb-2" required>
                                        @foreach($banks as $b)<option value="{{ $b }}">{{ $b === 'qris' ? 'QRIS (e-wallet / m-banking)' : 'Virtual Account ' . strtoupper($b) }}</option>@endforeach
                                    </select>
                                    <button class="btn btn-primary w-100">Pilih Paket</button>
                                </form>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-primary w-100">Daftar untuk Berlangganan</a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Paket belum tersedia.</p>
                @endforelse
            </div>

            @auth
                <p class="text-center mt-4"><a href="{{ route('subscription.history') }}">Riwayat tagihan</a></p>
            @endauth
        </div>
    </section>
</main>
@endsection
