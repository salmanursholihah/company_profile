@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="d-flex justify-content-between mb-3">
            <h3>Halaman Utama Slider</h3>
            <a href="{{ route('admin.halaman_utama.create') }}" class="btn btn-primary">
                Tambah Halaman Utama
            </a>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th width="180">Image</th>
                    <th>Headline</th>
                    <th>Sub Headline</th>
                    <th>URL</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($halaman_utama_list as $halaman_utama)
                    <tr>
                        <td>
                            <img src="{{ asset($halaman_utama->image) }}"
                                 width="160"
                                 class="img-fluid rounded shadow-sm">
                        </td>

                        <td>{{ $halaman_utama->headline }}</td>

                        <td>{!! nl2br(e($halaman_utama->sub_headline)) !!}</td>

                        <td>{{ $halaman_utama->url ?? '-' }}</td>

                        <td>
                            <a href="{{ route('admin.halaman_utama.edit', $halaman_utama->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.halaman_utama.destroy', $halaman_utama->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus item ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data Halaman Utama.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>
@endsection
