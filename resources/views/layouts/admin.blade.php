@php
    /*
     * Ikon (gaya "outline", 24x24). Dipakai di sidebar & dashboard tanpa library tambahan.
     */
    $icons = [
        'home'     => '<path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
        'settings' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1z"/>',
        'box'      => '<path d="M21 8 12 3 3 8v8l9 5 9-5z"/><path d="m3 8 9 5 9-5M12 13v8"/>',
        'truck'    => '<path d="M1 6h13v10H1zM14 10h4l3 3v3h-7z"/><circle cx="5.5" cy="18" r="2"/><circle cx="17.5" cy="18" r="2"/>',
        'file'     => '<path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6M8 13h8M8 17h5"/>',
        'mail'     => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'users'    => '<circle cx="9" cy="8" r="4"/><path d="M2 21a7 7 0 0 1 14 0M16 4a4 4 0 0 1 0 8M22 21a7 7 0 0 0-4-6.3"/>',
        'book'     => '<path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v17H6.5A2.5 2.5 0 0 0 4 21.5z"/><path d="M20 19v3H6.5A2.5 2.5 0 0 1 4 19.5"/>',
        'user'     => '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
        'info'     => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>',
        'layout'   => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>',
        'wrench'   => '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 0 0 5.4-5.4l-2.4 2.4-2.6-.6-.6-2.6z"/>',
        'panel'    => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 15h18"/>',
        'flask'    => '<path d="M9 3h6M10 3v6L4.5 19a2 2 0 0 0 1.7 3h11.6a2 2 0 0 0 1.7-3L14 9V3"/><path d="M7 15h10"/>',
        'briefcase'=> '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2M2 13h20"/>',
        'image'    => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-5-5L5 21"/>',
        'logout'   => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>',
        'menu'     => '<path d="M3 6h18M3 12h18M3 18h18"/>',
        'external' => '<path d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
    ];
    $svg = fn ($n) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$n] ?? '') . '</svg>';

    $role = auth()->user()->role ?? null;

    // [route, label, ikon, pola route untuk status aktif]
    if ($role === 'super_admin') {
        $menu = [
            'Utama' => [
                ['admin.dashboard', 'Dashboard', 'home', 'admin.dashboard'],
                ['admin.setting', 'Setting Situs (Logo & Warna)', 'settings', 'admin.setting*'],
            ],
            'Konten Website' => [
                ['admin.halaman_utama.index', 'Halaman Utama', 'layout', 'admin.halaman_utama.*'],
                ['admin.about.index', 'About', 'info', 'admin.about.*'],
                ['admin.services.index', 'Layanan Kami', 'wrench', 'admin.services.*'],
                ['admin.portfolio.index', 'Portfolio', 'briefcase', 'admin.portfolio.*'],
                ['admin.blogs.index', 'Blog Artikel', 'book', 'admin.blogs.*'],
                ['admin.images.index', 'Images', 'image', 'admin.images.*'],
                ['admin.footer.index', 'Footer', 'panel', 'admin.footer.*'],
            ],
            'Produk & Katalog' => [
                ['admin.products.index', 'Product', 'box', 'admin.products.*'],
                ['admin.katalogs.index', 'Katalog', 'file', 'admin.katalogs.*'],
                ['admin.hasil-uji-lab.index', 'Hasil Uji Lab', 'flask', 'admin.hasil-uji-lab.*'],
                ['admin.vendors.index', 'Vendor', 'truck', 'admin.vendors.*'],
            ],
            'Panduan & Langganan' => [
                ['admin.guides.index', 'Panduan & Materi', 'book', 'admin.guides.*'],
                ['admin.guide-categories.index', 'Kategori Panduan', 'layout', 'admin.guide-categories.*'],
                ['admin.subscription-plans.index', 'Paket Langganan', 'briefcase', 'admin.subscription-plans.*'],
                ['admin.subscriptions.index', 'Langganan & Tagihan', 'users', 'admin.subscriptions.*'],
            ],
            'Komunikasi & Akun' => [
                ['admin.contacts.index', 'Contact', 'mail', 'admin.contacts.*'],
                ['admin.users.index', 'Users', 'users', 'admin.users.*'],
                ['admin.profile.admin_profile', 'Profile Admin', 'user', 'admin.profile.*'],
            ],
        ];
    } elseif ($role === 'vendor') {
        $menu = [
            'Utama' => [['admin.dashboard', 'Dashboard', 'home', 'admin.dashboard']],
            'Vendor' => [
                ['admin.product_vendor.index', 'Product Vendor', 'box', 'admin.product_vendor.*'],
                ['admin.profile.vendor_profile', 'Profile Vendor', 'user', 'admin.profile.*'],
            ],
        ];
    } elseif ($role === 'blogger') {
        // Blogger: HANYA fitur blog
        $menu = [
            'Blog' => [['admin.blogs.index', 'Blog Artikel', 'book', 'admin.blogs.*']],
        ];
    } else {
        $menu = ['Utama' => [['admin.dashboard', 'Dashboard', 'home', 'admin.dashboard']]];
    }

    $userName = auth()->user()->name ?? 'Admin';
    $pageTitle = trim($__env->yieldContent('page-title')) ?: trim($__env->yieldContent('title')) ?: 'Dashboard';
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0b1220">
    <title>@yield('title', $site['brand_name'] . ' Admin')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link href="{{ asset('backend_assets/css/library/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/library/ionicons201/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/style.css') }}" rel="stylesheet">

    {{-- Warna dari Admin > Setting > Warna (variabel --brand dst.) --}}
    @include('partials.site-theme')
    {{-- Tema admin: harus paling akhir agar menimpa Bootstrap/Tailwind --}}
    <link href="{{ asset('assets/css/admin-ui.css') }}?v=1" rel="stylesheet">
    @stack('styles')
</head>

<body class="adm">

    <div class="adm-shell">
        {{-- ===== Sidebar ===== --}}
        <aside class="adm-sidebar" id="admSidebar" aria-label="Menu utama">
            <div class="adm-brand">
                @if ($siteLogoUrl)
                    <img src="{{ $siteLogoUrl }}" alt="{{ $site['brand_name'] }}">
                @else
                    <span class="adm-brand-mark">{{ strtoupper(mb_substr($site['brand_name'], 0, 1)) }}</span>
                    <h2 class="adm-brand-name">{{ $site['brand_name'] }}</h2>
                @endif
            </div>

            <nav class="adm-nav">
                @foreach ($menu as $group => $items)
                    <div class="adm-nav-label">{{ $group }}</div>
                    @foreach ($items as [$route, $label, $icon, $pattern])
                        <a href="{{ route($route) }}" class="{{ request()->routeIs($pattern) ? 'active' : '' }}"
                            @if (request()->routeIs($pattern)) aria-current="page" @endif>
                            {!! $svg($icon) !!}<span>{{ $label }}</span>
                        </a>
                    @endforeach
                @endforeach
            </nav>

            <div class="adm-side-foot">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="adm-logout">{!! $svg('logout') !!} Logout</button>
                </form>
            </div>
        </aside>
        <div class="adm-overlay" id="admOverlay"></div>

        {{-- ===== Konten ===== --}}
        <div class="adm-main">
            <header class="adm-topbar">
                <button type="button" class="adm-burger" id="admBurger" aria-label="Buka menu" aria-controls="admSidebar"
                    aria-expanded="false">{!! $svg('menu') !!}</button>
                <h1 class="adm-page-title">{{ $pageTitle }}</h1>

                <div class="adm-top-actions">
                    <a href="{{ url('/') }}" target="_blank" rel="noopener" class="adm-view-site">Lihat Website {!! str_replace('<svg', '<svg width="15" height="15"', $svg('external')) !!}</a>
                    <div class="adm-user">
                        <span class="adm-avatar">{{ strtoupper(mb_substr($userName, 0, 1)) }}</span>
                        <span class="adm-user-meta"><b>{{ $userName }}</b><small>{{ str_replace('_', ' ', $role ?? '') }}</small></span>
                    </div>
                </div>
            </header>

            @if (session('success') || session('error'))
                <div class="adm-flash" id="admFlash" role="status">
                    @if (session('success'))<div class="adm-toast ok">{{ session('success') }}</div>@endif
                    @if (session('error'))<div class="adm-toast err">{{ session('error') }}</div>@endif
                </div>
            @endif

            <main class="adm-content">
                @yield('content')
            </main>

            <footer class="adm-footer">&copy; {{ date('Y') }} {{ $site['brand_name'] }}</footer>
        </div>
    </div>

    <script src="{{ asset('backend_assets/css/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend_assets/css/library/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('assets/js/admin-ui.js') }}?v=1"></script>
</body>

</html>
