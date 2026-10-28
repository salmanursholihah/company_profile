@extends('layouts.app_landing')

@php
    $banks = ['bca'=>'BCA','bni'=>'BNI','bri'=>'BRI','permata'=>'Permata','mandiri'=>'Mandiri','qris'=>'QRIS'];
    $va    = $i['va'];
    $labels = ['pending'=>['Menunggu pembayaran','warning'],'paid'=>['Lunas','success'],'expired'=>['Kedaluwarsa','secondary'],'cancelled'=>['Dibatalkan','secondary']];
    [$lbl,$clr] = $labels[$i['status']] ?? [ucfirst($i['status']),'secondary'];
@endphp

@push('styles')
<style>
    .va-box{border:2px dashed rgba(0,0,0,.2);border-radius:14px;padding:1.2rem;text-align:center;background:#fafcfe}
    .qr-img{width:240px;max-width:100%;height:auto;background:#fff;padding:8px;border-radius:12px}
    .va-number{font-size:1.8rem;font-weight:800;letter-spacing:.08em;word-break:break-all}
</style>
@endpush

@section('content')
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Pembayaran</h1>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('subscription.plans') }}">Langganan</a></li>
                <li class="current">{{ $i['invoice_number'] }}</li>
            </ol></nav>
        </div>
    </div>

    <section class="section">
        <div class="container" style="max-width:720px">
            <div class="p-4 border rounded-3 bg-white">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                    <div>
                        <div class="text-muted small">No. Tagihan</div>
                        <div class="fw-semibold">{{ $i['invoice_number'] }}</div>
                    </div>
                    <span class="badge text-bg-{{ $clr }} fs-6">{{ $lbl }}</span>
                </div>
                <div class="row mb-3">
                    <div class="col-6"><div class="text-muted small">Paket</div><div class="fw-semibold">{{ $i['plan_name'] }}</div></div>
                    <div class="col-6 text-end"><div class="text-muted small">Total</div><div class="fw-bold fs-5">Rp {{ number_format($i['total_amount'], 0, ',', '.') }}</div></div>
                </div>

                @if($i['status'] === 'paid')
                    <div class="alert alert-success mb-3">Pembayaran diterima dan langganan Anda sudah aktif.</div>
                    <a href="{{ route('guides.index') }}" class="btn btn-primary">Mulai Belajar</a>

                @elseif($i['status'] === 'pending' && $va)
                    @if($va['bank'] === 'qris')
                    <div class="va-box mb-3">
                        <div class="text-muted small mb-2">Scan dengan GoPay, OVO, DANA, ShopeePay, atau m-banking apa pun</div>
                        @if($va['qr_url'])
                            <img src="{{ $va['qr_url'] }}" alt="QRIS" class="qr-img">
                        @else
                            <div class="alert alert-warning small mb-0">QR belum tersedia. Muat ulang halaman ini.</div>
                        @endif
                        <div class="mt-2 fw-semibold">Rp {{ number_format($va['amount'], 0, ',', '.') }}</div>
                    </div>
                    <p class="small mb-1">Scan sebelum <strong>{{ \Carbon\Carbon::parse($va['expired_at'] ?? $i['due_at'])->translatedFormat('d F Y, H:i') }}</strong>
                        (<span id="countdown"></span>).</p>
                    <ol class="small text-muted ps-3">
                        <li>Buka aplikasi e-wallet atau m-banking yang mendukung QRIS.</li>
                        <li>Pilih Scan / Bayar, lalu arahkan kamera ke kode QR di atas.</li>
                        <li>Pastikan nominal sesuai, lalu konfirmasi pembayaran.</li>
                    </ol>
                    @else
                    <div class="va-box mb-3">
                        <div class="text-muted small mb-1">Virtual Account {{ $banks[$va['bank']] ?? strtoupper($va['bank']) }}</div>
                        @if($va['biller_code'])
                            <div class="small text-muted">Kode Perusahaan (Biller): <strong>{{ $va['biller_code'] }}</strong></div>
                            <div class="small text-muted">Nomor Bayar</div>
                        @endif
                        <div class="va-number" id="vaNumber">{{ $va['va_number'] }}</div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="copyVa"><i class="bi bi-clipboard"></i> Salin nomor</button>
                        @if($va['va_name'])<div class="small text-muted mt-2">a.n. {{ $va['va_name'] }}</div>@endif
                    </div>
                    <p class="small mb-1">Bayar sebelum <strong>{{ \Carbon\Carbon::parse($va['expired_at'] ?? $i['due_at'])->translatedFormat('d F Y, H:i') }}</strong>
                        (<span id="countdown"></span>).</p>
                    <ol class="small text-muted ps-3">
                        <li>Buka m-banking / ATM / internet banking {{ $banks[$va['bank']] ?? strtoupper($va['bank']) }}.</li>
                        <li>Pilih menu transfer / bayar Virtual Account dan masukkan nomor di atas.</li>
                        <li>Pastikan nominal sesuai, lalu selesaikan pembayaran.</li>
                    </ol>
                    @endif
                    <div class="alert alert-light border small mb-0" id="statusMsg">
                        <span class="spinner-border spinner-border-sm me-2"></span>Halaman ini memeriksa pembayaran otomatis. Setelah lunas, langganan langsung aktif.
                    </div>

                @else
                    <div class="alert alert-secondary">Tagihan ini sudah tidak berlaku. Silakan pilih paket kembali.</div>
                    <a href="{{ route('subscription.plans') }}" class="btn btn-primary">Pilih Paket</a>
                @endif
            </div>
            <p class="text-center mt-3"><a href="{{ route('subscription.history') }}">Riwayat tagihan</a></p>
        </div>
    </section>
</main>
@endsection

@if($i['status'] === 'pending' && $va)
@push('scripts')
<script>
(function () {
    var copy = document.getElementById('copyVa');
    copy && copy.addEventListener('click', function () {
        var t = document.getElementById('vaNumber').textContent.trim();
        (navigator.clipboard ? navigator.clipboard.writeText(t) : Promise.reject()).then(function () {
            copy.textContent = 'Tersalin';
        }, function () { window.prompt('Salin nomor:', t); });
    });

    var due = new Date({{ \Carbon\Carbon::parse($va['expired_at'] ?? $i['due_at'])->valueOf() }});
    var cd = document.getElementById('countdown');
    function tick() {
        var s = Math.max(0, Math.floor((due - Date.now()) / 1000));
        cd.textContent = !s ? 'waktu habis' : (s >= 3600 ? 'sisa ' + Math.floor(s / 3600) + ' jam ' + Math.floor(s % 3600 / 60) + ' menit' : 'sisa ' + Math.floor(s / 60) + ' menit ' + (s % 60) + ' detik');
    }
    tick(); setInterval(tick, 1000);

    var url = @json(route('subscription.check', $i['invoice_number']));
    var timer = setInterval(function () {
        if (due < Date.now()) { clearInterval(timer); return; }
        fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': @json(csrf_token()), 'Accept': 'application/json' }, credentials: 'same-origin' })
            .then(function (r) { return r.ok ? r.json() : null; })
            .then(function (d) { if (d && d.payment_status && d.payment_status !== 'pending') { clearInterval(timer); location.reload(); } })
            .catch(function () {});
    }, 10000);
})();
</script>
@endpush
@endif
