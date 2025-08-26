@extends('layouts.admin')
@section('title', 'Daftar Vendor')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <a href="{{ route('admin.vendors.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah Vendor</a>

    <table class="min-w-full mt-4 bg-white rounded-xl overflow-hidden shadow">
        <thead class="bg-gray-50">
            <tr class="text-left border-b">
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Kontak</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Jumlah Product</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $vendor->name }}</td>
                <td class="px-4 py-2">{{ $vendor->email }}</td>
                <td class="px-4 py-2">{{ $vendor->kontak }}</td>
                <td class="px-4 py-2">{{ $vendor->alamat }}</td>
                <td class="px-4 py-2">{{ $vendor->jumlah_product }}</td>
                <td class="px-4 py-2">{{ ucfirst($vendor->status) }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</a>
                    <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $vendors->links() }}
    </div>
</div>
@endsection
