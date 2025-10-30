<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ositech Admin')</title>

    {{-- Ganti dari CDN ke file lokal --}}
    <link href="{{ asset('assets/css/tailwind.css') }}" rel="stylesheet">

    {{-- Bootstrap Lokal (hasil download via Invoke-WebRequest) --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Chart.js Lokal --}}
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
</head>>

<body class="flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow h-screen p-5">
        <h2 class="text-2xl font-bold mb-8">Ositech</h2>
        <nav class="flex-1 px-4 space-y-2">
            <!-- Dashboard & Katalog untuk semua role -->
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Dashboard</a>
            <a href="{{ route('admin.setting') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Settings</a>


            @if(auth()->user()->role === 'super_admin')
            <!-- Menu khusus admin -->
            <a href="{{ route('admin.products.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Product</a>
            <a href="{{ route('admin.vendors.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Vendor</a>
            <a href="{{ route('admin.blogs.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Blog
                artikel</a>
            <a href="{{ route('admin.contacts.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Contact</a>
            <a href="{{ route('admin.users.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Users</a>
            <a href="{{ route('admin.katalogs.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Katalog</a>

            <a href="{{ route('admin.profile.admin_profile') }}"
                class="block py-2 px-3 rounded hover:bg-cyan-600">Profile Admin</a>
            @elseif(auth()->user()->role === 'vendor')
            <!-- Menu khusus vendor -->
            <a href="{{ route('admin.product_vendor.index') }}"
                class="block py-2 px-3 rounded hover:bg-cyan-600">Product Vendor</a>
            <a href="{{ route('admin.profile.vendor_profile') }}"
                class="block py-2 px-3 rounded hover:bg-cyan-600">Profile Vendor</a>
            @endif
        </nav>
        <div class="p-4 border-t border-cyan-600">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full block py-2 px-3 rounded hover:bg-cyan-600">Logout</button>
            </form>
        </div>
    </aside>


    <!-- Main -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    @stack('scripts')
    @stack('styles')
</body>

</html>