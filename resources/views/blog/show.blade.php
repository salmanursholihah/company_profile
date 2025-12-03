@extends('layouts.app_landing')

@section('content')

<style>
    .blog-detail-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .blog-title {
        font-size: 32px;
        font-weight: bold;
        color: #0a5275;
        margin-bottom: 15px;
    }

    .blog-meta {
        font-size: 14px;
        color: #888;
        margin-bottom: 25px;
    }

    .blog-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .blog-content {
        font-size: 18px;
        line-height: 1.8;
        text-align: justify;
        color: #333;
        white-space: pre-line; /* agar format enter tidak hilang */
    }
</style>


<div class="blog-detail-container">

    {{-- Title --}}
    <h1 class="blog-title">{{ $blog->title }}</h1>

    {{-- Metadata --}}
    <div class="blog-meta">
        <strong>Category:</strong> {{ $blog->category }} ·
        <strong>Author:</strong> {{ $blog->author }} ·
        <strong>Date:</strong>
        {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : '-' }}
    </div>

    {{-- Image --}}
    @if ($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" class="blog-image" alt="Blog Image">
    @endif

    {{-- Content --}}
    <div class="blog-content">
        {!! nl2br(e($blog->content)) !!}
    </div>

</div>

@endsection
