@extends('layouts.admin')

@section('content')
<h2>{{ $portfolio->name }}</h2>

<p><strong>Category:</strong> {{ $portfolio->category }}</p>

@if ($portfolio->image)
<img src="{{ asset('storage/' . $portfolio->image) }}" width="300" class="my-3">
@endif

<p>{{ $portfolio->description }}</p>

<a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Back</a>
@endsection
