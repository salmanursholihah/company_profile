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

    <h5 class="mt-4">Sosial Media</h5>
    <small class="text-muted d-block mb-3">Kosongkan kolom yang tidak ingin ditampilkan. Ikon hanya muncul untuk kolom yang terisi.</small>

    @php $sl = $footer->social_links ?? []; @endphp

    <div class="mb-3">
        <label>WhatsApp (nomor, contoh: 083116668809 atau 6283116668809)</label>
        <input type="text" name="whatsapp" value="{{ $sl['whatsapp'] ?? '' }}" class="form-control" placeholder="6283116668809">
    </div>
    <div class="mb-3">
        <label>Instagram (link)</label>
        <input type="text" name="instagram" value="{{ $sl['instagram'] ?? '' }}" class="form-control" placeholder="https://www.instagram.com/akun_anda">
    </div>
    <div class="mb-3">
        <label>Facebook (link)</label>
        <input type="text" name="facebook" value="{{ $sl['facebook'] ?? '' }}" class="form-control" placeholder="https://www.facebook.com/halaman_anda">
    </div>
    <div class="mb-3">
        <label>Twitter / X (link)</label>
        <input type="text" name="twitter" value="{{ $sl['twitter'] ?? '' }}" class="form-control" placeholder="https://x.com/akun_anda">
    </div>
    <div class="mb-3">
        <label>LinkedIn (link)</label>
        <input type="text" name="linkedin" value="{{ $sl['linkedin'] ?? '' }}" class="form-control" placeholder="https://www.linkedin.com/company/nama_perusahaan">
    </div>
    <div class="mb-3">
        <label>TikTok (link)</label>
        <input type="text" name="tiktok" value="{{ $sl['tiktok'] ?? '' }}" class="form-control" placeholder="https://www.tiktok.com/@akun_anda">
    </div>
    <div class="mb-3">
        <label>YouTube (link)</label>
        <input type="text" name="youtube" value="{{ $sl['youtube'] ?? '' }}" class="form-control" placeholder="https://www.youtube.com/@channel_anda">
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
