<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ositech Admin')</title>


    {{-- ====== Favicon dari tailwind ====== --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    {{-- ====== CSS dari Template Admin ====== --}}
    <link href="{{ asset('backend_assets/css/library/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/library/ionicons201/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/style.css') }}" rel="stylesheet"> {{-- file utama custom --}}
</head>

<body class="bg-light">

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar bg-dark text-white p-4" style="min-height: 100vh; width: 250px;">
            <h2 class="mb-4">Ositech</h2>
            <nav class="nav flex-column">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                <a href="{{ route('admin.setting') }}" class="nav-link text-white">Settings</a>

                @if (auth()->user()->role === 'super_admin')
                    <a href="{{ route('admin.products.index') }}" class="nav-link text-white">Product</a>
                    <a href="{{ route('admin.vendors.index') }}" class="nav-link text-white">Vendor</a>
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link text-white">Blog Artikel</a>
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white">Contact</a>
                    <a href="{{ route('admin.users.index') }}" class="nav-link text-white">Users</a>
                    <a href="{{ route('admin.katalogs.index') }}" class="nav-link text-white">Katalog</a>
                    <a href="{{ route('admin.profile.admin_profile') }}" class="nav-link text-white">Profile Admin</a>
                    <a href="{{ route('admin.about.index') }}" class="nav-link text-white">About</a>
                    <a href="{{ route('admin.halaman_utama.index') }}" class="nav-link text-white">Halaman Utama</a>
                    <!-- <a href="{{ route('admin.visi_misi.index') }}" class="nav-link text-white">Visi Misi</a> -->
                    <a href="{{ route('admin.services.index') }}" class="nav-link text-white">Layanan Kami</a>
                    <a href="{{ route('admin.footer.index') }}" class="nav-link text-white">Footer</a>
                    <!-- <a href="{{ route('admin.legalitas.index') }}" class="nav-link text-white">legalitas</a> -->
                     <a href="{{ route('admin.hasil-uji-lab.index') }}" class="nav-link text-white">Hasil Uji Lab</a>
                    <a href="{{ route('admin.team.index') }}" class="nav-link text-white">team</a>
                    <a href="{{ route('admin.portfolio.index') }}" class="nav-link text-white">Portfolio</a>
                    <a href="{{ route('admin.images.index') }}" class="nav-link text-white">Images</a>
                @elseif(auth()->user()->role === 'vendor')
                    <a href="{{ route('admin.product_vendor.index') }}" class="nav-link text-white">Product Vendor</a>
                    <a href="{{ route('admin.profile.vendor_profile') }}" class="nav-link text-white">Profile
                        Vendor</a>
                @endif
            </nav>

            <div class="mt-4 border-top pt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    {{-- ====== JS dari Template Admin ====== --}}
    <script src="{{ asset('backend_assets/js/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend_assets/js/library/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend_assets/js/main.js') }}"></script>
</body>

</html>
