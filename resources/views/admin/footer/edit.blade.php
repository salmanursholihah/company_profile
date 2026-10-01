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
        <label>Useful Links (satu baris satu link, format: Nama | /url)</label>
        <textarea name="useful_links" rows="5" class="form-control" placeholder="Home | /&#10;About us | /about">{{ collect($footer->useful_links ?? [])->map(fn($l) => is_array($l) ? (($l['name'] ?? '') . ' | ' . ($l['url'] ?? '#')) : $l)->implode("\n") }}</textarea>
    </div>

    <div class="mb-3">
        <label>Our Services (pisahkan dengan koma)</label>
        <input type="text" name="our_services" value="{{ collect($footer->our_services ?? [])->map(fn($s) => is_array($s) ? ($s['name'] ?? '') : $s)->implode(',') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nomor WhatsApp (contoh: 0831xxxxxxxx atau 62831xxxxxxxx)</label>
        <input type="text" name="whatsapp" value="{{ $footer->social_links['whatsapp'] ?? '' }}" class="form-control" placeholder="6283116668809">
        <small class="text-muted">Kosongkan jika tidak ingin menampilkan ikon WhatsApp.</small>
    </div>

    <div class="mb-3">
        <label>Social Links (format JSON, tanpa WhatsApp)</label>
        <textarea name="social_links" rows="3" class="form-control">{{ json_encode(collect($footer->social_links ?? [])->except('whatsapp')->all(), JSON_PRETTY_PRINT) }}</textarea>
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
