@extends('layouts.app_landing')

@push('styles')
<style>
    .video-wrap{position:relative;aspect-ratio:16/9;border-radius:12px;overflow:hidden;background:#000}
    .video-wrap iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
    .article-body img{max-width:100%;height:auto}
    .article-body{line-height:1.8}
</style>
@endpush

@section('content')
<main class="main">
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>{{ $lesson->title }}</h1>
            <nav class="breadcrumbs"><ol>
                <li><a href="{{ route('guides.index') }}">Panduan</a></li>
                <li><a href="{{ route('guides.show', $guide->slug) }}">{{ $guide->title }}</a></li>
                <li class="current">{{ $lesson->title }}</li>
            </ol></nav>
        </div>
    </div>

    <section class="section">
        <div class="container" style="max-width:900px">
            @if($denied)
                <div class="text-center p-5 border rounded-3 bg-white">
                    <i class="bi bi-lock-fill display-5 text-secondary"></i>
                    <p class="mt-3">{{ $denied }}</p>
                    @if($code === \App\Services\GuideAccessService::LOGIN_REQUIRED)
                        <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Sign Up</a>
                    @else
                        <a href="{{ route('contact.index') }}" class="btn btn-primary">Hubungi Kami untuk Berlangganan</a>
                    @endif
                </div>
            @else
                @if($lesson->description)<p class="text-muted">{{ $lesson->description }}</p>@endif

                @if($lesson->type === 'video' && $lesson->video_id)
                    <div class="video-wrap">
                        <iframe src="https://www.youtube-nocookie.com/embed/{{ $lesson->video_id }}" title="{{ $lesson->title }}"
                            allow="accelerometer; encrypted-media; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                    </div>
                @elseif($lesson->type === 'article')
                    <article class="article-body">{!! $lesson->content !!}</article>
                @elseif($lesson->type === 'file')
                    <div class="p-4 border rounded-3 bg-white d-flex align-items-center gap-3">
                        <i class="bi bi-file-earmark-arrow-down display-6 text-primary"></i>
                        <div class="flex-grow-1">
                            <div class="fw-semibold">{{ $lesson->file_name ?: 'Dokumen' }}</div>
                            <div class="small text-muted text-uppercase">{{ $lesson->file_ext }}</div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('guides.download', [$guide->slug, $lesson->id]) }}">Unduh</a>
                    </div>
                @endif
            @endif

            <div class="d-flex justify-content-between mt-4">
                @if($prevId)<a class="btn btn-outline-secondary" href="{{ route('guides.lesson', [$guide->slug, $prevId]) }}"><i class="bi bi-arrow-left"></i> Sebelumnya</a>@else<span></span>@endif
                <a class="btn btn-link" href="{{ route('guides.show', $guide->slug) }}">Daftar materi</a>
                @if($nextId)<a class="btn btn-primary" href="{{ route('guides.lesson', [$guide->slug, $nextId]) }}">Berikutnya <i class="bi bi-arrow-right"></i></a>@else<span></span>@endif
            </div>
        </div>
    </section>
</main>
@endsection
