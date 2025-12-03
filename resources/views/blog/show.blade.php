@extends('layouts.app_landing')

@section('content')

<!-- Blog Header -->
<section class="page-title dark-background">
    <div class="container">
        <h1 class="text-white">{{ $blog->title }}</h1>
        <p class="text-light">{{ $blog->category }}</p>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Blog Image -->
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         class="img-fluid rounded mb-4 shadow"
                         alt="{{ $blog->title }}">
                @endif

                <!-- Meta Info -->
                <div class="d-flex align-items-center mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ $blog->author }}&rounded=true&size=60"
                         class="rounded-circle me-3 shadow-sm">

                    <div>
                        <h5 class="mb-0">{{ $blog->author }}</h5>
                        <small class="text-muted">
                            {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') : 'Draft' }}
                        </small>
                    </div>
                </div>

                <!-- Blog Content -->
                <article class="content-body">
                    {!! nl2br(e($blog->content)) !!}
                </article>

                <!-- Back Button -->
                <a href="{{ route('blog.index') }}" class="btn btn-primary mt-4 px-4">
                    ← Back to Blog
                </a>

            </div>
        </div>

    </div>
</section>

@endsection
