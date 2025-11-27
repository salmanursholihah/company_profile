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
                        <a href="#about" class="btn-get-started">Read More</a>
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
                        <a href="#about" class="btn-get-started">Read More</a>
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
                        <a href="#about" class="btn-get-started">Read More</a>
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
                    <h2 class="fw-bold mb-4" data-aos="fade-up">Selayang Pandang</h2>

                    <p>
                        {{-- PT Utama Cipta Tata Asri bergerak di bidang Design Engineering & Manufacturing dengan fokus
                        lingkungan.
                        Kami mengkhususkan pada mesin pengolah limbah cair kami berkomitment terhadap lingkungan dan
                        kualitas, menyediakan mesin-mesin inovatif yang telah terpasang di berbagai instansi
                        pemerintahan dan swasta. --}}

                        PT Utama Cipta Tata Asri merupakan perusahaan manufaktur yang bergerak dalam bidang rekayasa
                        lingkungan pengelolaan
                        limbah, khususnya limbah cair. kami merupakan produsen ipal (instalasi pengolahan air limbah)
                        yang inovatif, efisien, dan ramah lingkungan. menghadirkan solusi yang komprehensif untuk
                        pengelolaan limbah medis, limbah domestik, serta limbah industri yang memenuhi standar regulasi
                        lingkungan nasional, sesuai dengan PerMen LHK

                        <br><br><br>

                        Dengan pengalaman lebih dari 10 tahun dan dukungan tenaga ahli profesional, PT Utama Cipta Tata
                        Asri terus berinovasi untuk
                        menghadirkan produk yang efisien, ramah lingkungan, dan handal yang mendukung layanan medis
                        agar lebih aman dan berkelanjutan.

                        <br><br><br>
                        Kami percaya bahwa
                        kualitas air bersih yang memenuhi standar baku mutu adalah bagian penting dari keberlangsungan
                        hidup dan lingkungan yang
                        sehat.
                    </p>

                    <br><br><br>
                    <h5>Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan diantaranya :</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Instalasi cepat & handal</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Pelatihan operator & pendampingan</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Produk ramah lingkungan & hemat energi
                        </li>
                    </ul>
                    {{-- <a href="#featured-products" class="btn btn-outline-primary mt-3">Lihat Produk</a> --}}
                    <a href="{{ route('about') }}" class="btn btn-outline-secondary mt-3">read more</a>
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
                        <br>
                        <i class="fa-solid fa-eye fa-2xl text-primary"></i>
                        <br>
                        <h5 class="fw-bold">Visi</h5>
                        {{-- <p>Menjadi perusahaan pengelolaan air limbah yang inovatif, terpercaya, dan berkelanjutan Dengan
                            kualitas terbaik.</p> --}}
                        <p>Menjadi perusahaan penyedia layanan pengelolaan air limbah yang inovatif, tepercaya, dan
                            berkelanjutan dengan kualitas terbaik.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card border-0 shadow h-100 p-4">
                        <br>
                        <i class="fa-solid fa-lightbulb fa-2xl display-5 text-success mb-3" style="color: #ffc107;"></i>
                        <br>

                        <h5 class="fw-bold">Misi</h5>
                        <ul class="text-start">
                            <li>
                                <p>Mengurangi dampak pencemaran lingkungan melalui penerapan sistem manajemen lingkungan
                                    yang berkelanjutan</p>
                            </li>
                            <li>
                                <p>Melakukan pemeliharaan preventif dan korektif terhadap peralatan IPAL untuk menjaga
                                    kendala operasional</p>
                            </li>
                            <li>
                                <p>Mengembangkan dan memproduksi unit instalasi pengolahan air limbah (IPAL) yang
                                    efektif
                                    dan berkualitas.</p>
                            </li>
                            <li>
                                <p>Menerapkan teknologi pengolahan limbah cair yang efisien dan ramah lingkungan.</p>
                            </li>
                            <li>
                                <p>Mendukung pengendalian pencemaran air melalui pengolahan limbah yang sesuai baku mutu
                                    lingkungan.</p>
                            </li>
                            <li>
                                <p>Memberikan layanan instalasi, pengujian (commissioning), dan pelatihan operasional
                                    IPAL.</p>
                            </li>
                            <li>Menyediakan layanan perawatan dan perbaikan (maintenance) untuk menjamin keandalan
                                sistem IPAL.</li>
                            <li>
                                <p>Mengoptimalkan pengelolaan lumpur hasil olahan (sludge) agar aman dan sesuai standar
                                    teknis.</p>
                            </li>
                            <li>
                                <p>Mendorong pemanfaatan kembali air hasil olahan (reuse) untuk mendukung efisiensi
                                    sumber
                                    daya air.</p>
                            </li>


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
            <h2 class="fw-bold mb-4" data-aos="fade-up">Layanan Kami</h2>
        <div class="service-container">

            <div class="service-card">
                <img src="assets/img/layanan/produksi.jpeg" alt="Layanan 1">
                <div class="service-content">
                    <h3>Produksi & Pabrikasi IPAL</h3>
                    <p>Sebagai produsen instalasi pengolahan limbah cair (IPAL), kami menyediakan solusi rekayasa
                        teknologi
                        yang dirancang sesuai karakteristik dan kebutuhan proses setiap pelanggan. </p>
                    <a href="{{ route('produksi_pabrikasi_ipal') }}">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/img/layanan/konstruksi.png" alt="Layanan 2">
                <div class="service-content">
                    <h3>Konstruksi & Pembangunan IPAL</h3>
                    <p>Selain produksi unit, kami juga menangani pekerjaan konstruksi IPAL secara menyeluruh. Mencakup
                        pekerjaan sipil (civil work) seperti pembuatan bak pre-treatment, bak
                        aerasi, sedimentasi, klorinasi, hingga struktur pondasi dan ruang mesin.</p>
                    <a href="{{ route('konstruksi_pembangunan') }}">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/img/layanan/instalasi.jpeg" alt="Layanan 3">
                <div class="service-content">
                    <h3>Instalasi & Commissioning</h3>
                    <p>Setelah tahap produksi dan konstruksi, kami melanjutkan dengan instalasi dan commissioning untuk
                        memastikan IPAL siap beroperasi secara optimal.</p>
                    <a href="{{ route('instalasi') }}">Selengkapnya →</a>
                </div>
            </div>

            <div class="service-card">
                <img src="assets/img/layanan/maintenance.jpeg" alt="Layanan 4">
                <div class="service-content">
                    <h3>Perawatan & Maintenance IPAL</h3>
                    <p>Dalam pengelolaan air limbah membutuhkan pemeliharaan yang tepat agar sistem tetap berfungsi
                        maksimal.
                        Karena itu, kami menyediakan layanan operational & maintenance (O&M) untuk memastikan IPAL
                        pelanggan tetap bekerja dengan baik setiap hari. </p>
                    <a href="{{ route('perawatan') }}">Selengkapnya →</a>
                </div>
            </div>


        </div>
    </section>

    <!---end layanan--->

    <!-- Featured Products sparepart Section -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
            <h2 class="fw-bold mb-4" data-aos="fade-up">Produk</h2>
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
                        'img' => '80m3.1.jpg',
                        'title' => '80m3.1',
                        'location' => 'Magelang, Indonesia',
                    ],
                    [
                        'img' => 'IPAL 100m3.2.png',
                        'title' => 'IPAL 100m3.2',
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
