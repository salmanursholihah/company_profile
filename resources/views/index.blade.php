@extends('layouts.app_landing')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style_katalog_index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product_bestseller.css') }}">
@endpush

<main class="main">


    <!--hero section -->
    <section id="hero" class="hero section dark-background">

        <!-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> -->

        <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="container position-relative">

                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2>PT Utama Cipta Tata Asri</h2>
                        {{-- <p>Solusi Pengolahan Air Limbah Terpercaya
                            Kami adalah perusahaan yang bergerak di bidang perencanaan, pembangunan, dan pengelolaan
                            Instalasi Pengolahan Air Limbah (IPAL). Dengan standar teknologi ramah lingkungan dan hasil
                            yang terukur, kami membantu industri, perumahan, rumah sakit, dan pemerintahan dalam
                            mewujudkan pengelolaan limbah yang aman dan berkelanjutan.</p> --}}
                        <p>Kami adalah perusahaan manufaktur yang bergerak dalam bidang rekayasa lingkungan pengelolaan
                            limbah, khususnya limbah cair. kami merupakan produsen ipal (instalasi pengolahan air
                            limbah) yang inovatif, efisien, dan ramah lingkungan.
                            menghadirkan solusi yang komprehensif untuk pengelolaan limbah medis, limbah domestik, serta
                            limbah industri yang memenuhi standar regulasi lingkungan nasional, sesuai dengan PerMen
                            LHK.</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2>Instalasi & Maintenance IPAL</h2>
                        <p> Menyediakan layanan lengkap mulai dari Pengadaan, konstruksi, instalasi alat, uji kualitas
                            air,
                            hingga perawatan berkala. Setiap sistem dirancang sesuai kebutuhan dan kapabilitas pelanggan
                            yang mengacu kepada standar Permen LHK di Indonesia. sehingga menghasilkan limbah yang aman,
                            biaya yang efisien, dan fasilitas mudah dioperasikan.</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2>Reliable, Ecolable, and Reasonable</h2>
                        <p>
                            Dengan motto Reliable, Ecolable, and Reasonable, kami menghadirkan solusi pengolahan limbah
                            cair
                            yang bekerja secara otomatis tanpa pendampingan operator yang harus stand by, ramah
                            lingkungan,
                            dan hemat biaya. Produk-produk kami dirancang untuk beroperasi sepanjang waktu, mengurangi
                            dampak pencemaran, serta membantu perusahaan mencapai efisiensi energi dan operasional
                            secara
                            lebih mudah dan berkelanjutan.</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </div>

    </section><!-- /Hero Section -->

    {{-- About Section (safe) --}}
    @if (isset($about) && $about)
        <section id="about" class="section py-5">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{ isset($about->image) && $about->image ? asset('storage/' . $about->image) : asset('assets/img/team2.jpeg') }}"
                            class="img-fluid rounded shadow" alt="About Us">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <h2 class="fw-bold mb-4" data-aos="fade-up">{{ $about->headline ?? 'Selayang Pandang' }}</h2>

                        <p>{!! nl2br(e($aboutPreview)) !!}</p>

                        <br><br><br>
                        <h5>Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan diantaranya :</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2-circle text-primary me-2"></i>Instalasi cepat & handal</li>
                            <li><i class="bi bi-check2-circle text-primary me-2"></i>Pelatihan operator & pendampingan
                            </li>
                            <li><i class="bi bi-check2-circle text-primary me-2"></i>Produk ramah lingkungan & hemat
                                energi</li>
                        </ul>

                        <a href="{{ route('about') }}" class="btn btn-outline-secondary mt-3">read more</a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- optional: show nothing or a placeholder -->
    @endif



    <!--visi misi-->
    <!--visi misi-->
    <section class="section py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4" data-aos="fade-up">Visi & Misi</h2>

            <div class="row g-4">

                {{-- VISI --}}
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="card border-0 shadow h-100 p-4">
                        <br>
                        <i class="fa-solid fa-eye fa-2xl text-primary"></i>
                        <br>
                        <h5 class="fw-bold">Visi</h5>

                        @if ($visi)
                            <p>{{ $visi->text }}</p>
                        @else
                            <p><em>Belum ada visi di backend.</em></p>
                        @endif
                    </div>
                </div>

                {{-- MISI --}}
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card border-0 shadow h-100 p-4">
                        <br>
                        <i class="fa-solid fa-lightbulb fa-2xl text-success mb-3"></i>
                        <br>

                        <h5 class="fw-bold">Misi</h5>

                        @if ($misi->count())
                            <ul class="text-start">
                                @foreach ($misi as $item)
                                    <li>
                                        <p>{{ $item->text }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p><em>Belum ada misi di backend.</em></p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--end visi misi-->
    <!--end visi misi-->

    <br><br><br>


    {{-- <section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Layanan Kami</h2>

        <div class="row g-4">

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-tools fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">Pabrikasi IPAL</h4>
                    <p class="text-muted mt-2">
                        Pembuatan unit IPAL lengkap dari tangki, pipa, struktur, dan sistem pemrosesan air limbah.
                    </p>

                    <a href="{{route('produksi_pabrikasi_ipal')}}" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-recycle fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">Instalasi & Pemasangan</h4>
                    <p class="text-muted mt-2">
                        Pemasangan sistem IPAL di lokasi proyek dengan standar teknis dan kualitas terbaik.
                    </p>

                    <a href="{{route('instalasi')}}" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-wrench fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">Maintenance & Service</h4>
                    <p class="text-muted mt-2">
                        Perawatan berkala, perbaikan, dan pengecekan performa IPAL agar selalu optimal.
                    </p>

                    <a href="{{route('perawatan')}}" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-water fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">IPAL Mobile / Sewaan</h4>
                    <p class="text-muted mt-2">
                        Penyewaan unit IPAL portabel untuk kebutuhan proyek jangka pendek maupun darurat.
                    </p>

                    <a href="#" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-flask fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">Uji Lab & Analisa Air</h4>
                    <p class="text-muted mt-2">
                        Pengujian kualitas air (BOD, COD, TSS, pH, dll) sesuai standar baku mutu.
                    </p>

                    <a href="#" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- CARD -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-4">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                        style="width:70px;height:70px;">
                        <i class="fas fa-chart-line fs-3"></i>
                    </div>

                    <h4 class="mt-5 fw-semibold">Konsultasi & Desain IPAL</h4>
                    <p class="text-muted mt-2">
                        Perencanaan dan desain IPAL sesuai kapasitas, jenis limbah, dan regulasi.
                    </p>

                    <a href="#" class="text-primary fw-semibold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

        </div>
    </div>
</section> --}}

    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Layanan Kami</h2>

            <div class="row g-4">

                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-4 position-relative p-4">

                            <!-- ICON -->
                            <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                                style="width:70px;height:70px;">
                                <i class="fas fa-chart-line fs-3"></i>
                            </div>

                            <!-- TITLE -->
                            <h4 class="mt-5 fw-semibold">{{ $service->title }}</h4>

                            <!-- DESCRIPTION -->
                            <p class="text-muted mt-2">
                                {{ $service->description }}
                            </p>

                            <!-- LINK -->
                            <a href="{{ $service->link }}" class="text-primary fw-semibold">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!--end layanan kami-->

    <!-- Featured Products sparepart Section -->
    {{-- <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
        <h2 class="text-center fw-bold mb-5">Produk</h2>
                <p data-aos="fade-up" data-aos-delay="100"></p>Solusi inovatif kami yang banyak diminati instansi
                medis &
                swasta.
            </div>

            @php
                $products = [
                    // [
                    //     'img' => '1 3,5m3+solar panel.png',
                    //     'title' => '1 3,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    // [
                    //     'img' => '1 4,5m3+solar panel.jpg',
                    //     'title' => '1 4,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    // [
                    //     'img' => '1 5,5m3+solar panel.png',
                    //     'title' => '1 5,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    [
                        'img' => '1m3.jpg',
                        'title' => '1m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => '60m3.png',
                        'title' => '60m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => '80m3.jpg',
                        'title' => '80m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 100m3.png',
                        'title' => 'IPAL 100m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 100m3.png',
                        'title' => 'IPAL 100m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 130m3.png',
                        'title' => 'IPAL 130m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 160m3.png',
                        'title' => 'IPAL 160m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 180m3.png',
                        'title' => 'IPAL 180m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'RUMAH IPAL 3,5m3.jpg',
                        'title' => 'RUMAH IPAL 3,5m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                ];
            @endphp

            <div class="catalog">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('assets/img/portfolio/' . $product['img']) }}" alt="">
                        <div class="product-title">{{ $product['title'] }}</div>
                        <div class="location">{{ $product['location'] }}</div>
                        <div class="btn-group">
                            <a href="https://wa.me/6281234567890" class="btn">
                                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                            </a>
                            <a href="https://id.shp.ee/ZS6izam" class="btnn">
                                <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- /Featured Products sparepart Section --> --}}
        <!-- Featured Products sparepart Section -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
            <h2 class="text-center fw-bold mb-5">Produk</h2>
                <p data-aos="fade-up" data-aos-delay="100"></p>Solusi inovatif kami yang banyak diminati instansi
                medis &
                swasta.
            </div>

            @php
                $products = [
                    // [
                    //     'img' => '1 3,5m3+solar panel.png',
                    //     'title' => '1 3,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    // [
                    //     'img' => '1 4,5m3+solar panel.jpg',
                    //     'title' => '1 4,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    // [
                    //     'img' => '1 5,5m3+solar panel.png',
                    //     'title' => '1 5,5m3+solar panel',
                    //     'location' => 'Magelang, Indonesia',
                    // ],
                    [
                        'img' => '1m3.jpg',
                        'title' => '1m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => '60m3.png',
                        'title' => '60m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => '80m3.jpg',
                        'title' => '80m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 100m3.png',
                        'title' => 'IPAL 100m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 100m3.png',
                        'title' => 'IPAL 100m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 130m3.png',
                        'title' => 'IPAL 130m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 160m3.png',
                        'title' => 'IPAL 160m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 180m3.png',
                        'title' => 'IPAL 180m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'RUMAH IPAL 3,5m3.jpg',
                        'title' => 'RUMAH IPAL 3,5m3',
                        'location' => 'Magelang, Indonesia',
                    ],
                ];
            @endphp

            <div class="catalog">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('assets/img/portfolio/' . $product['img']) }}" alt="">
                        <div class="product-title">{{ $product['title'] }}</div>
                        <div class="location">{{ $product['location'] }}</div>
                        <div class="btn-group">
                            <a href="https://wa.me/6281234567890" class="btn">
                                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                            </a>
                            <a href="https://id.shp.ee/ZS6izam" class="btnn">
                                <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- /Featured Products sparepart Section -->



    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                 {
                     "loop": true,
                     "speed": 600,
                     "autoplay": {
                         "delay": 5000
                     },
                     "slidesPerView": "auto",
                     "pagination": {
                         "el": ".swiper-pagination",
                         "type": "bullets",
                         "clickable": true
                     },
                     "breakpoints": {
                         "320": {
                             "slidesPerView": 2,
                             "spaceBetween": 40
                         },
                         "480": {
                             "slidesPerView": 3,
                             "spaceBetween": 60
                         },
                         "640": {
                             "slidesPerView": 4,
                             "spaceBetween": 80

                         }
                     }
                 }
                 </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/bsn.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/iso-9001.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/vkan.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/iapmo.png" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </div>


        </div>

    </section><!-- /Clients Section -->




</main>
