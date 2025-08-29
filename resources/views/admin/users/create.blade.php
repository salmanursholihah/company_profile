@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
