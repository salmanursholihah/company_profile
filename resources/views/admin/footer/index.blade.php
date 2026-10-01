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
        @foreach($footer->useful_links ?? [] as $item)
            <li>
                @if(is_array($item))
                    {{ $item['name'] ?? '' }} <small class="text-muted">({{ $item['url'] ?? '#' }})</small>
                @else
                    {{ $item }}
                @endif
            </li>
        @endforeach
    </ul>

    <h5>Our Services:</h5>
    <ul>
        @foreach($footer->our_services ?? [] as $item)
            <li>{{ is_array($item) ? ($item['name'] ?? '') : $item }}</li>
        @endforeach
    </ul>

    <h5>Social Media:</h5>
    <pre>{{ json_encode($footer->social_links ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>

    <hr>

    <p>{{ $footer->tagline }}</p>
    <small>{{ $footer->copyright }}</small>
</div>

@endsection

