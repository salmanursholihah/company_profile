@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Container -->
<div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Filter/Search -->
    <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <div class="flex gap-2">
            <input type="text" placeholder="Cari produk..." class="border rounded-lg px-3 py-2 w-64">
            <select class="border rounded-lg px-3 py-2">
                <option>Kategori</option>
                <option>Elektronik</option>
                <option>Pakaian</option>
                <option>Alat Rumah</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Terapkan</button>
    </div>
<br><br>
    <td class="px-4 py-3 text-right space-x-2">
    <a href="{{ route('admin.products.create') }}"
        class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Tambah</a>
</td>

    <!-- Tabel Produk -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr class="text-left border-b">
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Nama Produk</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Discount</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Lokasi</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <img src="{{ asset('storage/'.$product->image) }}" class="w-16 h-16 rounded-lg object-cover"
                            alt="">
                    </td>
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="px-4 py-3">{{ $product->kategori }}</td>
                    <td class="px-4 py-3">{{ Str::limit($product->deskripsi, 50) }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $product->discount ? $product->discount.'%' : '-' }}</td>
                    <td class="px-4 py-3">{{ $product->stok }}</td>
                    <td class="px-4 py-3">{{ $product->lokasi }}</td>
                    <td class="px-4 py-3">
                        <span
                            class="px-2 py-1 rounded-full text-xs {{ $product->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-800' }}">
                            {{ $product->status }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.products.edit', $product) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

      <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
        <p>
            Menampilkan 
            {{ $products->firstItem() }} - {{ $products->lastItem() }} 
            dari {{ $products->total() }} produk
        </p>
        <div>
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>

</div>
@endsection