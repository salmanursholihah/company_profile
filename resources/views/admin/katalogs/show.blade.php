@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2 class="mb-4">Detail Katalog</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="row">

                    {{-- IMAGE --}}
                    <div class="col-md-4 text-center">
                        @if ($katalog->image)
                            <img src="{{ asset('storage/' . $katalog->image) }}" class="img-fluid rounded mb-3"
                                style="max-height:300px;">
                        @else
                            <p class="text-muted">No Image</p>
                        @endif
                    </div>

                    {{-- DATA --}}
                    <div class="col-md-8">

                        <h4 class="mb-3">{{ $katalog->name }}</h4>

                        <table class="table table-bordered">

                            <tr>
                                <th width="200">Company</th>
                                <td>{{ $katalog->company ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Kategori</th>
                                <td>{{ $katalog->kategori ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Preview Deskripsi</th>
                                <td>
                                    {!! nl2br(e($katalog->preview_desc)) !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Deskripsi Lengkap</th>
                                <td>
                                    {!! nl2br(e($katalog->deskripsi)) !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Spesifikasi</th>
                                <td>
                                    {!! nl2br(e($katalog->spesifikasi)) !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Dibuat</th>
                                <td>
                                    {{ $katalog->created_at ? $katalog->created_at->format('d M Y H:i') : '-' }}
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>

                {{-- BUTTON ACTION --}}
                <div class="mt-3">

                    <a href="{{ route('admin.katalogs.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <a href="{{ route('admin.katalogs.edit', $katalog) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.katalogs.destroy', $katalog) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
@endsection
