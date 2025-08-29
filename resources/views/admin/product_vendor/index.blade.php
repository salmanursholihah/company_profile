@extends('layouts.admin')

@section('title', 'Produk Vendor')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Filter/Search -->
    <form method="GET" action="{{ route('admin.product_vendor.index') }}" class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="border rounded-lg px-3 py-2 w-64">
            <select name="category" class="border rounded-lg px-3 py-2">
                <option value="">Semua Kategori</option>
                <option value="Elektronik" {{ request('category') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Pakaian" {{ request('category') == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="Alat Rumah" {{ request('category') == 'Alat Rumah' ? 'selected' : '' }}>Alat Rumah</option>
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Terapkan</button>
    </form>
<br>
        <a href="{{ route('admin.product_vendor.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah product</a>

        <br>
    <!-- Tabel Produk -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr class="text-left border-b">
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Nama Produk</th>
                    <th class="px-4 py-3">Vendor</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productvendors as $product_vendor)
                <tr>
                    <td><img src="{{ asset('storage/' . $product_vendor->image) }}" class="w-16 h-16 rounded-lg object-cover" alt="{{ $product_vendor->name }}"></td>
                    <td>{{ $product_vendor->name }}</td>
                    <td>{{ $product_vendor->vendor->name ?? '-' }}</td>
                    <td>{{ $product_vendor->category }}</td>
                    <td>{{ Str::limit($product_vendor->description, 50) }}</td>
                    <td>Rp {{ number_format($product_vendor->price, 0, ',', '.') }}</td>
                    <td>{{ $product_vendor->stock }}</td>
                    <td>
                        <a href="{{ route('admin.product_vendor.edit', $product_vendor->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('admin.product_vendor.destroy', $product_vendor->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus produk ini?')" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-6 text-gray-500">Tidak ada produk ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($productvendors->hasPages())
    <div class="flex justify-between items-center text-sm text-gray-600">
        <p>
            Menampilkan {{ $productvendors->firstItem() }} - {{ $productvendors->lastItem() }} dari {{ $productvendors->total() }} produk
        </p>
        <div>
            {{ $productvendors->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
