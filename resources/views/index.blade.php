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
                        <p>kami adalah perusahaan manufaktur yang bergerak di dalam bidang rekayasa lingkungan dan
                            pengolahan air limbah khususnya produsen sistem IPAL (instalasi pengelolaan air limbah) yang
                            inovatif, efisien, dan ramah
                            lingkungan. kami menghadirkan solusi komprehensif untuk pengelolaan limbah domestik, limbah
                            industri, dan limbah medis yang memenuhi standar regulasi lingkungan nasional (PerMenLHK)
                            maupun international</p>
                        <a href="#about" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2>Instalasi & Maintenance IPAL</h2>
                        Kami menyediakan layanan lengkap mulai dari Layanan Pengadaan, konstruksi, instalasi alat, uji
                        kualitas air, hingga perawatan berkala. Setiap sistem dirancang sesuai kebutuhan pelanggan
                        berdasarkan standar Permen LH & regulasi lingkungan hidup Indonesia, sehingga hasil aman,
                        efisien, dan mudah dioperasikan. <a href="#about" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2>Lingkungan Bersih, Operasi Lebih Efisien</h2>

                        Kami berkomitmen untuk menghadirkan solusi pengolahan limbah yang efektif, hemat biaya, dan
                        berkelanjutan. Dengan tenaga ahli berpengalaman dan teknologi yang tepat, kami membantu klien
                        memenuhi aturan lingkungan, mengurangi dampak pencemaran, serta mendukung keberlanjutan
                        operasional perusahaan. <a href="#about" class="btn-get-started">Read More</a>
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

    <!-- About Section -->
    <section id="about" class="section py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('assets/img/team2.jpeg') }}" class="img-fluid rounded shadow" alt="About Us">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2>Selayang Pandang</h2>
                    <p>
                        {{-- PT Utama Cipta Tata Asri bergerak di bidang Design Engineering & Manufacturing dengan fokus
                        lingkungan.
                        Kami mengkhususkan pada mesin pengolah limbah cair kami berkomitment terhadap lingkungan dan
                        kualitas, menyediakan mesin-mesin inovatif yang telah terpasang di berbagai instansi
                        pemerintahan dan swasta. --}}

                        PT Utama Cipta Tata Asri adalah perusahaan manufaktur yang bergerak dalam bidang rekayasa
                        lingkungan dan pengolahan air limbah, khususnya produsen sistem IPAL (Instalasi Pengolahan Air
                        Limbah) yang inovatif, efisien, dan ramah lingkungan. Kami menghadirkan solusi komprehensif
                        untuk pengolahan limbah domestik, limbah industri, dan limbah medis yang memenuhi standar
                        regulasi lingkungan nasional (PerMenLHK) maupun internasional.

                        <br><br><br>

                        dengan pengalaman lebih dari 10 tahun dan dukungan tenaga ahli profesional, PT Utama Cipta Tata asri terus berinovasi untuk
                        menghadirkan product yang efisien, ramah lingkungan, dan handal yang mendukung layanan medis
                        agar lebih aman dan berkelanjutan

                        <br><br><br>
                        Kami percaya bahwa
                        kualitas air yang bersih adalah bagian penting dari keberlangsungan hidup dan lingkungan yang
                        sehat.
                    </p>

                    <br><br><br>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Instalasi cepat & handal</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Pelatihan operator & pendampingan</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Produk ramah lingkungan & hemat energi
                        </li>
                    </ul>
                    <a href="#featured-products" class="btn btn-outline-primary mt-3">Lihat Produk</a>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->


    <!--visi misi-->
    <section class="section py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4" data-aos="fade-up">Visi & Misi</h2>
            <div class="row g-4">
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="card border-0 shadow h-100 p-4">
                        <i class="bi bi-award display-5 text-warning mb-3"></i>
                        <h5 class="fw-bold">Visi</h5>
                        <p>Menjadi perusahaan pengelolaan air limbah yang inovatif, terpercaya, dan berkelanjutan dengan
                            kualitas terbaik.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card border-0 shadow h-100 p-4">
                        <i class="bi bi-rocket-takeoff display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Misi</h5>
                        <ul class="text-start">
                            <li>Menyediakan pelayanan terbaik dan nomor satu</li>
                            <li>Menyediakan produk ramah lingkungan & hemat energi</li>
                            <li>Memberikan pendampingan & pelatihan operator</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end visi misi-->

    <br><br><br>

    <!---layanan--->
    <section class="services-section">
        <h2>Layanan Kami</h2>
        <div class="service-container">

            <div class="service-card">
                <img src="https://via.placeholder.com/400x250" alt="Layanan 1">
                <div class="service-content">
                    <h3>Pengelolaan Limbah B3</h3>
                    <p>Melayani pengelolaan limbah B3 fase solid, liquid dan sludge.</p>
                    <a href="#">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="https://via.placeholder.com/400x250" alt="Layanan 2">
                <div class="service-content">
                    <h3>Pengangkutan Limbah</h3>
                    <p>Pengangkutan limbah dengan legalitas lengkap & driver bersertifikat.</p>
                    <a href="#">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="https://via.placeholder.com/400x250" alt="Layanan 3">
                <div class="service-content">
                    <h3>Pengolahan Air Limbah</h3>
                    <p>Mengolah air limbah agar aman & ramah lingkungan.</p>
                    <a href="#">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="https://via.placeholder.com/400x250" alt="Layanan 4">
                <div class="service-content">
                    <h3>Pengelolaan Minyak & Gas</h3>
                    <p>Layanan limbah industri migas dan produksi energi.</p>
                    <a href="#">Selengkapnya →</a>
                </div>
            </div>

        </div>
    </section>

    <!---end layanan--->

    <!-- Featured Products sparepart Section -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up">Produk </h2>
                <p data-aos="fade-up" data-aos-delay="100">Solusi inovatif kami yang banyak diminati instansi medis &
                    swasta.</p>
            </div>

            @php
                $products = [
                    [
                        'img' => 'app-1.png',
                        'title' => 'ipal oshitech WT PRO 004i 1 m³',
                        'old' => 'Rp179.000',
                        'new' => 'Rp143.200',
                        'discount' => '-20%',
                        'location' => 'magelang, Indonesia',
                    ],
                    [
                        'img' => 'app-2.png',
                        'title' => 'ipal oshitech WT PRO 004i 3 m³',
                        'old' => 'Rp650.000',
                        'new' => 'Rp520.000',
                        'discount' => '-20%',
                        'location' => 'magelang, Indonesia',
                    ],
                    [
                        'img' => 'app-3.png',
                        'title' => 'ipal oshitech WT PRO 004i 4,5 m³',
                        'old' => 'Rp899.000',
                        'new' => 'Rp720.000',
                        'discount' => '-20%',
                        'location' => 'magelang, Indonesia',
                    ],
                    [
                        'img' => 'app-4.png',
                        'title' => 'ipal oshitech WT PRO 004i 5 m³',
                        'old' => 'Rp450.000',
                        'new' => 'Rp360.000',
                        'discount' => '-20%',
                        'location' => 'magelang, Indonesia',
                    ],
                ];
            @endphp

            <div class="catalog">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('assets/img/portfolio/' . $product['img']) }}" alt="">
                        <div class="product-title">{{ $product['title'] }}</div>
                        <div class="product-price">
                            <span class="old-price">{{ $product['old'] }}</span>
                            <span class="new-price">{{ $product['new'] }}</span>
                            <span class="discount">({{ $product['discount'] }})</span>
                        </div>
                        <div class="location">{{ $product['location'] }}</div>
                        <div class="btn-group">
                            <a href="https://wa.me/6281234567890" class="btn">
                                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                            </a>
                            <a href="https://milospro.com/" class="btnn">
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
