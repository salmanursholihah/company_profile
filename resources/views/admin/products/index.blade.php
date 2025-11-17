@extends('layouts.admin')

@section('title', 'Products Management')

@section('content')
    <div class="container mx-auto px-6 py-8">

        <!-- Header + Filter -->
        <div class="bg-white rounded-xl shadow p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Manajemen Produk</h1>

            <div class="flex flex-wrap gap-2">
                <input type="text" placeholder="Cari produk..."
                    class="border border-gray-300 rounded-lg px-3 py-2 w-56 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                <select class="border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Kategori</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Pakaian">Pakaian</option>
                    <option value="Alat Rumah">Alat Rumah</option>
                </select>
                <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                    Terapkan
                </button>
                <a href="{{ route('admin.products.create') }}"
                    class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    + Tambah Produk
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Nama Produk</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Deskripsi</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-left">Diskon</th>
                        <th class="px-4 py-3 text-left">Stok</th>
                        <th class="px-4 py-3 text-left">Lokasi</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-14 h-14 rounded-lg object-cover border">
                            </td>
                            <td class="px-4 py-3 font-medium">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->kategori }}</td>
                            <td class="px-4 py-3">{{ Str::limit($product->deskripsi, 50) }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">{{ $product->discount ? $product->discount . '%' : '-' }}</td>
                            <td class="px-4 py-3">{{ $product->stok }}</td>
                            <td class="px-4 py-3">{{ $product->lokasi }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium 
                                {{ $product->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                    {{ $product->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-6 text-gray-500">
                                Belum ada produk yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8 border-t pt-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-600">
                <p class="text-center md:text-left">
                    Menampilkan
                    <strong>{{ $products->firstItem() ?? 0 }}</strong> -
                    <strong>{{ $products->lastItem() ?? 0 }}</strong>
                    dari <strong>{{ $products->total() ?? 0 }}</strong> produk
                </p>

                <div class="w-full md:w-auto flex justify-center md:justify-end">
                    <div class="inline-flex">
                        {{ $products->onEachSide(1)->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
