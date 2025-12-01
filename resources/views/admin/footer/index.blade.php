@extends('layouts.admin')

@section('content')

<h3>Footer Settings</h3>

<a href="{{ route('admin.footer.edit', $footer->id) }}" class="btn btn-primary">Edit Footer</a>

<div class="card mt-3 p-3">
    <h4>{{ $footer->company_name }}</h4>
    <p>{!! nl2br(e($footer->address)) !!}</p>
    <p>Phone: {{ $footer->phone }}</p>
    <p>Email: {{ $footer->email }}</p>

    <hr>

    <h5>Useful Links:</h5>
    <ul>
        @foreach($footer->useful_links as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <h5>Our Services:</h5>
    <ul>
        @foreach($footer->our_services as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <h5>Social Media:</h5>
    <pre>{{ print_r($footer->social_links, true) }}</pre>

    <hr>

    <p>{{ $footer->tagline }}</p>
    <small>{{ $footer->copyright }}</small>
</div>

@endsection

