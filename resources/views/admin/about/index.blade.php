@extends('layouts.admin')

@section('content')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Manage About</h3>

            @if ($about)
                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">
                    Edit Konten
                </a>
            @else
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary">
                    Tambah Konten
                </a>
            @endif
        </div>

        @if ($about)
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset($about->image) }}" class="img-fluid rounded border" alt="about image">
                </div>

                <div class="col-md-7">
                    <h2>{{ $about->headline }}</h2>
                    <h5 class="text-muted">{{ $about->sub_headline }}</h5>

                    <p class="mt-3">
                        {!! nl2br(e($about->description)) !!}
                    </p>

                    @if ($about->url)
                        <a href="{{ $about->url }}" target="_blank" class="btn btn-info mt-3">
                            Lihat Link
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Data About belum diisi. Silakan tambahkan.
            </div>
        @endif

    </div>

@endsection
