@extends('layouts.app_landing')

@push('styles')
<style>
    .lesson-row{display:flex;gap:.9rem;align-items:center;padding:.9rem 1rem;border:1px solid rgba(0,0,0,.08);border-radius:12px;background:#fff;text-decoration:none;color:inherit;margin-bottom:.6rem}
    .lesson-row:hover{border-color:rgba(0,0,0,.25)}
    .lesson-ico{width:42px;height:42px;border-radius:10px;background:#eef4fa;display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:#4a7fa8;flex:none}
    .lesson-row .t{font-weight:600}
    .lesson-row .m{font-size:.8rem;color:#6b7280}
</style>
@endpush

@section('content')
@php $icons = ['video' => 'bi-play-circle', 'article' => 'bi-file-text', 'file' => 'bi-file-earmark-arrow-down']; @endphp
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>{{ $guide->title }}</h1>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('guides.index') }}">Panduan</a></li>
                <li class="current">{{ $guide->title }}</li>
            </ol></nav>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h4 class="mb-3">Daftar Materi ({{ $lessons->count() }})</h4>
                    @forelse($lessons as $i => $l)
                        <a class="lesson-row" href="{{ route('guides.lesson', [$guide->slug, $l->id]) }}">
                            <span class="lesson-ico"><i class="bi {{ $icons[$l->type] ?? 'bi-journal' }}"></i></span>
                            <span class="flex-grow-1">
                                <div class="t">{{ $i + 1 }}. {{ $l->title }}</div>
                                <div class="m">{{ ucfirst($l->type) }}@if($l->duration_minutes) · {{ $l->duration_minutes }} menit @endif</div>
                            </span>
                            @if($l->is_free)
                                <span class="badge text-bg-success">Gratis</span>
                            @elseif($locked[$l->id])
                                <span class="badge text-bg-secondary"><i class="bi bi-lock-fill"></i> Premium</span>
                            @else
                                <span class="badge text-bg-primary">Terbuka</span>
                            @endif
                        </a>
                    @empty
                        <p class="text-muted">Materi belum tersedia.</p>
                    @endforelse
                </div>

                <div class="col-lg-4">
                    <div class="p-3 border rounded-3 bg-white">
                        @if($guide->cover_url)<img src="{{ $guide->cover_url }}" class="img-fluid rounded mb-3" alt="{{ $guide->title }}">@endif
                        <div class="small text-muted mb-2">
                            {{ $guide->category->name ?? 'Umum' }}@if($guide->level) · {{ ucfirst($guide->level) }}@endif
                        </div>
                        <p>{{ $guide->summary }}</p>
                        @if($guide->description)<div class="small">{!! nl2br(e($guide->description)) !!}</div>@endif
                        @guest
                            <hr>
                            <p class="small text-muted mb-2">Masuk untuk membuka materi non-gratis.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Sign In</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Sign Up</a>
                        @endguest
                        <hr>
                        <a href="{{ route('subscription.plans') }}" class="btn btn-outline-primary btn-sm">Lihat Paket Langganan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
