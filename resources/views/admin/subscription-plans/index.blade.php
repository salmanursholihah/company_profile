@extends('layouts.admin')
@section('title', 'Paket Langganan')

@section('content')
<a href="{{ route('admin.subscription-plans.create') }}" class="btn btn-primary mb-3">Tambah Paket</a>

<table class="table table-bordered">
    <thead><tr><th>Urutan</th><th>Nama</th><th>Durasi</th><th>Harga</th><th>Populer</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
        @forelse ($plans as $p)
        <tr>
            <td>{{ $p->sort_order }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->duration_days }} hari</td>
            <td>{{ $p->price_label }}</td>
            <td>{{ $p->is_popular ? 'Ya' : '-' }}</td>
            <td>{{ $p->is_active ? 'Aktif' : 'Nonaktif' }}</td>
            <td>
                <a href="{{ route('admin.subscription-plans.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.subscription-plans.destroy', $p) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus paket ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada paket.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
