<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Company Profile PT Utama Cipta Tata Asri - Ositech</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.jpeg') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS + perbaikan tampilan (harus setelah main.css) -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/ui-refresh.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="blog-details-page">

    <!-- ================= HEADER ================= -->
    <header id="header" class="header d-flex align-items-center fixed-top header-custom">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('index') }}" class="logo d-flex align-items-center">
                <span class="sitename">Ositech</span>
            </a>

            <nav id="navmenu" class="navmenu" aria-label="Menu utama">
                <ul>
                    <li><a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('product') }}" class="{{ request()->routeIs('product') ? 'active' : '' }}">Product</a></li>
                    <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                    <li><a href="{{ route('e-katalog') }}" class="{{ request()->routeIs('e-katalog*') ? 'active' : '' }}">E-katalog</a></li>
                    <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Sign Up</a></li>
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Sign In</a></li>
                    <li><a href="{{ route('contact.index') }}" class="nav-cta {{ request()->routeIs('contact.*') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
    <!-- =============== END HEADER ================= -->

    <!-- =============== MAIN CONTENT ================= -->
    <div class="site-main">
        @yield('content')
    </div>
    <!-- =============== END MAIN ================= -->

    {{-- LOGO MITRA / FOOTER LOGO --}}
    @if ($footerLogos->count())
        <section class="footer-logo-slider py-5">
            <div class="container">
                <div class="swiper footerSwiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($footerLogos as $logo)
                            <div class="swiper-slide text-center">
                                <div class="logo-card">
                                    <img src="{{ asset('storage/' . $logo->image_path) }}" class="img-fluid footer-logo-img" alt="Logo mitra">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ================= FOOTER ================= -->
    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">

                {{-- COMPANY --}}
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('index') }}" class="d-flex align-items-center">
                        <span class="sitename">{{ $footer->company_name ?? 'PT Utama Cipta Tata Asri' }}</span>
                    </a>
                    <p>{{ $footer?->address ?? '-' }}</p>
                    <p class="mt-3"><strong>Phone:</strong> {{ $footer?->phone ?? '-' }}</p>
                    <p><strong>Email:</strong> {{ $footer?->email ?? '-' }}</p>
                </div>

                {{-- USEFUL LINKS --}}
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @foreach ($footer->useful_links ?? [] as $link)
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ is_array($link) ? ($link['url'] ?? '#') : '#' }}">
                                    {{ is_array($link) ? ($link['name'] ?? '') : $link }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- SERVICES --}}
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        @foreach ($footer->our_services ?? [] as $service)
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">{{ is_array($service) ? $service['name'] : $service }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- SOCIAL --}}
                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p class="italic">{{ $footer?->tagline ?? '-' }}</p>

                    <div class="social-links d-flex">
                        @php
                            $icons = [
                                'twitter' => 'twitter-x', 'facebook' => 'facebook', 'instagram' => 'instagram',
                                'tiktok' => 'tiktok', 'youtube' => 'youtube', 'linkedin' => 'linkedin', 'whatsapp' => 'whatsapp',
                            ];
                        @endphp

                        @foreach ($footer->social_links ?? [] as $platform => $url)
                            @php
                                // Kalau yang disimpan hanya nomor (mis. 6283116668809), ubah jadi link wa.me
                                if ($platform === 'whatsapp' && !str_starts_with($url, 'http')) {
                                    $url = 'https://wa.me/' . preg_replace('/\D/', '', $url)
                                        . '?text=' . rawurlencode('Halo PT Utama Cipta Tata Asri, saya ingin bertanya tentang produk.');
                                }
                            @endphp
                            <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($platform) }}">
                                <i class="bi bi-{{ $icons[$platform] ?? $platform }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>{{ $footer?->copyright ?? '-' }}</p>
        </div>

    </footer>
    <!-- =============== END FOOTER ================= -->

    {{-- WHATSAPP FLOATING BUTTON --}}
    @php
        $waRaw = $footer->social_links['whatsapp'] ?? null;
        $waLink = null;
        if ($waRaw) {
            $waLink = str_starts_with($waRaw, 'http')
                ? $waRaw
                : 'https://wa.me/' . preg_replace('/\D/', '', $waRaw)
                    . '?text=' . rawurlencode('Halo PT Utama Cipta Tata Asri, saya ingin bertanya tentang produk.');
        }
    @endphp
    @if ($waLink)
        <a href="{{ $waLink }}" target="_blank" rel="noopener" class="wa-float" aria-label="Chat WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
    @endif

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center" aria-label="Kembali ke atas">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')

    @if ($footerLogos->count())
        <script>
            new Swiper(".footerSwiper", {
                loop: true,
                speed: 800,
                autoplay: { delay: 2300, disableOnInteraction: false },
                slidesPerView: 2,
                spaceBetween: 25,
                breakpoints: {
                    480: { slidesPerView: 3 },
                    768: { slidesPerView: 4 },
                    992: { slidesPerView: 5 },
                    1200: { slidesPerView: 6 }
                }
            });
        </script>
    @endif

</body>

</html>
