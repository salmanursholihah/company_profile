@extends('layouts.admin')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">
    <h2 class="text-xl font-bold mb-4">Edit Profile</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
@method ('PUT')
        <!-- Name -->
        <div>
            <label for="name" class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $user->name) }}"
                   class="border rounded-lg w-full px-3 py-2">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email', $user->email) }}"
                   class="border rounded-lg w-full px-3 py-2">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block font-medium mb-1">Password Baru (Opsional)</label>
            <input type="password" name="password" id="password"
                   class="border rounded-lg w-full px-3 py-2">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block font-medium mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="border rounded-lg w-full px-3 py-2">
        </div>

        <!-- Avatar -->
        <div>
            <label for="avatar" class="block font-medium mb-1">Foto Profil (Opsional)</label>
            <input type="file" name="avatar" id="avatar"
                   class="border rounded-lg w-full px-3 py-2">
            @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                     class="mt-2 w-20 h-20 rounded-full">
            @endif
            @error('avatar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
