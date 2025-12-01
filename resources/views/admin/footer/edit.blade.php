@extends('layouts.admin')

@section('content')
<h3>Edit Footer</h3>

<form action="{{ route('admin.footer.update', $footer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" value="{{ $footer->company_name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $footer->address }}</textarea>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $footer->phone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $footer->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Useful Links (pisahkan dengan koma)</label>
        <input type="text" name="useful_links" value="{{ implode(',', $footer->useful_links ?? []) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Our Services (pisahkan dengan koma)</label>
        <input type="text" name="our_services" value="{{ implode(',', $footer->our_services ?? []) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Social Links (format JSON)</label>
        <textarea name="social_links" rows="3" class="form-control">
{{ json_encode($footer->social_links, JSON_PRETTY_PRINT) }}
        </textarea>
    </div>

    <div class="mb-3">
        <label>Tagline</label>
        <input type="text" name="tagline" value="{{ $footer->tagline }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Copyright</label>
        <input type="text" name="copyright" value="{{ $footer->copyright }}" class="form-control">
    </div>

    <button class="btn btn-success">Save Changes</button>
</form>

@endsection
