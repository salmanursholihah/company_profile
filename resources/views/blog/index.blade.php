@extends('layouts.app_landing')

@section('content')
    <div class="container py-5">

        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">

                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}"
                            style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <small class="text-muted">{{ $blog->category }}</small>

                            <h5 class="mt-2">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="text-dark">
                                    {{ $blog->title }}
                                </a>
                            </h5>

                            <div class="d-flex align-items-center mt-3">
                                <img src="https://ui-avatars.com/api/?name={{ $blog->author }}" class="rounded-circle me-2"
                                    width="40" height="40">
                                <div>
                                    <strong>{{ $blog->author }}</strong><br>
                                    <small class="text-muted">
                                        {{ $blog->published_at ? date('M d, Y', strtotime($blog->published_at)) : 'Draft' }}
                                    </small>
                                </div>
                            </div>

                       </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
