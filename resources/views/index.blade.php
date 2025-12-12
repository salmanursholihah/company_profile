@extends('layouts.app_landing')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style_katalog_index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product_bestseller.css') }}">
@endpush

<main class="main">



{{-- <section id="hero" class="hero section dark-background"
    style="--hero-bg: url('{{ asset($halaman_utama[0]->image) }}');">

    <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach ($halaman_utama as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                style="--hero-bg: url('{{ asset($item->image) }}');">


                <div class="carousel-container">
                    <h2>{{ $item->headline }}</h2>
                    <p>{!! nl2br(e($item->sub_headline)) !!}</p>
                    <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                </div>

            </div>
        @endforeach


        @foreach ($halaman_utama as $index => $halaman_utama)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="carousel-container">
                            <h2>{{ $halaman_utama->headline }}</h2>

                            <p>{!! nl2br(e($halaman_utama->sub_headline)) !!}</p>

                            <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                        </div>
                    </div>
                @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>

</section> --}}

<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach ($halaman_utama as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                style="background-image: url('{{ asset($item->image) }}');">

                <div class="container position-relative">
                    <div class="carousel-container">
                        <h2>{{ $item->headline }}</h2>
                        <p>{!! nl2br(e($item->sub_headline)) !!}</p>
                    </div>
                </div>

            </div>
        @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>

</section>

{{-- <section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        @foreach ($halaman_utama as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                style="background-image: url('{{ asset($item->image) }}');">

                <div class="carousel-container">
                    <h2>{{ $item->headline }}</h2>
                    <p>{!! nl2br(e($item->sub_headline)) !!}</p>
                    <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                </div>
            </div>
        @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

</section> --}}






    {{-- About Section (safe) --}}
    @if (isset($about) && $about)
        <section id="about" class="section py-5">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6" data-aos="fade-left">
                        <img src="{{ asset($about->image) }}" class="img-fluid rounded shadow" alt="About Image">
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
                @foreach ($katalogs as $katalog)
                    <div class="product-card">

                        {{-- Image --}}
                        @if ($katalog->image)
                            <img src="{{ asset('storage/' . $katalog->image) }}" class="img-fluid" alt="katalog">
                        @else
                            <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" alt="no image">
                        @endif

                        {{-- Title --}}
                        <div class="product-title">{{ $katalog->name }}</div>

                        {{-- Location --}}
                        <div class="location">{{ $katalog->lokasi ?? 'Indonesia' }}</div>

                        {{-- Buttons --}}
                        <div class="btn-group">
                            <a href="https://wa.me/{{ $katalog->whatsapp ?? '6281234567890' }}" class="btn">
                                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                            </a>

                            <a href="{{ $katalog->link_toko ?? 'https://id.shp.ee/ZS6izam' }}" class="btnn">
                                <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section><!-- /Featured Products sparepart Section -->

    <section id="clients" class="clients section">
        <div class="container">

            <div class="swiper init-swiper">

                <script type="application/json" class="swiper-config">
            {
                "loop": true,
                "speed": 600,
                "autoplay": {"delay": 5000},
                "slidesPerView": "auto",
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {"slidesPerView": 2, "spaceBetween": 40},
                    "480": {"slidesPerView": 3, "spaceBetween": 60},
                    "640": {"slidesPerView": 4, "spaceBetween": 80}
                }
            }
            </script>

                <div class="swiper-wrapper align-items-center">
                    @foreach ($legalitas as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads/legalitas/' . $item->image) }}" class="img-fluid"
                                alt="Legalitas Image">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>





</main>
