@extends('layouts.admin')

@section('content')

<h2>{{ $blog->title }}</h2>

<p><strong>Category:</strong> {{ $blog->category }}</p>
<p><strong>Author:</strong> {{ $blog->author }}</p>
<p><strong>Date:</strong> {{ $blog->published_at }}</p>

@if ($blog->image)
    <img src="{{ asset('storage/' . $blog->image) }}" width="300" class="my-3">
@endif

<div>{!! nl2br(e($blog->content)) !!}</div>

<a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsection
