
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <!-- Container -->
  <div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Filter/Search -->
    <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
      <div class="flex gap-2">
        <input type="text" placeholder="Cari user..." class="border rounded-lg px-3 py-2 w-64">
        <select class="border rounded-lg px-3 py-2">
          <option>vendor</option>
          <option>user</option>
          <option>admin</option>
        </select>
      </div>
      <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Terapkan</button>
    </div>
<br><br><br>
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah User</a>

    <!-- Tabel Produk -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="bg-gray-50">
          <tr class="text-left border-b">
            <th class="px-4 py-3">gambar</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3">password</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
<tr class="border-b hover:bg-gray-50">
    <td class="px-4 py-3">
        <img src="{{ $user->avatar ?? 'https://via.placeholder.com/80' }}" class="w-16 h-16 rounded-lg object-cover" alt="">
    </td>
    <td class="px-4 py-3">{{ $user->name }}</td>
    <td class="px-4 py-3">{{ $user->email }}</td>
    <td class="px-4 py-3">{{ $user->role }}</td>
    <td class="px-4 py-3">******</td>
    <td class="px-4 py-3">
        @if ($user->status)
            <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">Aktif</span>
        @else
            <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700">Nonaktif</span>
        @endif
    </td>
    <td class="px-4 py-3 text-right space-x-2">
        <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</a>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg" onclick="return confirm('Yakin ingin menghapus user ini?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
      </table>
    </div>

    <!-- Pagination -->
   <div class="flex justify-between items-center text-sm text-gray-600">
    <p>Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }} user</p>
    <div class="flex gap-2">
        {{ $users->links() }}
    </div>
</div>
  </div>

  @endsection