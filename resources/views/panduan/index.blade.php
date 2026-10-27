@extends('layouts.app_landing')

@push('styles')
<style>
    .guide-card{border:1px solid rgba(0,0,0,.08);border-radius:14px;overflow:hidden;height:100%;background:#fff;transition:transform .15s,box-shadow .15s}
    .guide-card:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(0,0,0,.08)}
    .guide-cover{aspect-ratio:16/9;background:linear-gradient(135deg,#e8f1f8,#cfe3f1);display:flex;align-items:center;justify-content:center;font-size:2.5rem;color:#6a9bbd}
    .guide-cover img{width:100%;height:100%;object-fit:cover}
    .guide-card .body{padding:1rem 1.1rem 1.2rem}
    .guide-meta{font-size:.8rem;color:#6b7280}
    .chip{display:inline-block;padding:.3rem .8rem;border-radius:999px;border:1px solid rgba(0,0,0,.12);font-size:.85rem;color:inherit;text-decoration:none;margin:0 .35rem .5rem 0}
    .chip.active{background:var(--accent-color,#0d6efd);border-color:transparent;color:#fff}
</style>
@endpush

@section('content')
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Panduan</h1>
            <p>Materi belajar dan panduan penggunaan layanan, tersedia dalam bentuk video, artikel, dan dokumen.</p>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="current">Panduan</li>
            </ol></nav>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <form method="get" class="row g-2 mb-3">
                @if($activeCat)<input type="hidden" name="category" value="{{ $activeCat }}">@endif
                <div class="col-md-8 col-lg-6">
                    <input type="search" name="q" value="{{ $search }}" class="form-control" placeholder="Cari panduan...">
                </div>
                <div class="col-auto"><button class="btn btn-primary"><i class="bi bi-search"></i> Cari</button></div>
            </form>

            <div class="mb-3">
                <a class="chip {{ $activeCat ? '' : 'active' }}" href="{{ route('guides.index', array_filter(['q' => $search])) }}">Semua</a>
                @foreach($categories as $c)
                    <a class="chip {{ $activeCat === $c->slug ? 'active' : '' }}"
                       href="{{ route('guides.index', array_filter(['category' => $c->slug, 'q' => $search])) }}">{{ $c->name }}</a>
                @endforeach
            </div>

            <div class="row g-4">
                @forelse($guides as $g)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('guides.show', $g->slug) }}" class="text-decoration-none text-reset">
                            <div class="guide-card">
                                <div class="guide-cover">
                                    @if($g->cover_url)<img src="{{ $g->cover_url }}" alt="{{ $g->title }}" loading="lazy">@else<i class="bi bi-journal-text"></i>@endif
                                </div>
                                <div class="body">
                                    <div class="guide-meta mb-1">
                                        {{ $g->category->name ?? 'Umum' }}@if($g->level) · {{ ucfirst($g->level) }}@endif
                                    </div>
                                    <h5 class="mb-2">{{ $g->title }}</h5>
                                    <p class="mb-2 text-muted small">{{ \Illuminate\Support\Str::limit($g->summary, 110) }}</p>
                                    <div class="guide-meta">
                                        <i class="bi bi-collection-play"></i> {{ $g->lessons_count }} materi
                                        @if($g->free_lessons_count) · <span class="text-success">{{ $g->free_lessons_count }} gratis</span>@endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">Belum ada panduan yang cocok.</div>
                @endforelse
            </div>

            <div class="mt-4 d-flex justify-content-center">{{ $guides->links('pagination::bootstrap-5') }}</div>
        </div>
    </section>
</main>
@endsection
