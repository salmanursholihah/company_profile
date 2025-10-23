@extends('layouts.app_landing')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style_katalog_index.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/product_bestseller.css')}}">
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
                        <p>Solusi Pengolahan Air Limbah Terpercaya
                            Kami adalah perusahaan yang bergerak di bidang perencanaan, pembangunan, dan pengelolaan
                            Instalasi Pengolahan Air Limbah (IPAL). Dengan standar teknologi ramah lingkungan dan hasil
                            yang terukur, kami membantu industri, perumahan, rumah sakit, dan pemerintahan dalam
                            mewujudkan pengelolaan limbah yang aman dan berkelanjutan.</p> <a href="#about"
                            class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2>Desain, Instalasi & Maintenance IPAL</h2>
                        Kami menyediakan layanan lengkap mulai dari desain sistem IPAL, konstruksi, instalasi alat, uji
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


{{-- 
    <!-- Quick Services Section -->
    <section id="quick-services" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up">Layanan Unggulan Kami</h2>
                <p data-aos="fade-up" data-aos-delay="100">Kami menyediakan solusi lengkap, efisien dan ramah
                    lingkungan.</p>
            </div>

            <div class="row g-4">
                @php
                    $services = [
                        [
                            'icon' => 'bi-gear',
                            'title' => 'Design Engineering',
                            'desc' => 'Solusi rekayasa mesin dan sistem pengolahan
                limbah.',
                            'color' => 'bg-primary',
                        ],
                        [
                            'icon' => 'bi-truck',
                            'title' => 'Pengiriman Cepat',
                            'desc' => 'Gratis pengiriman Pulau Jawa &
                Sumatera.',
                            'color' => 'bg-success',
                        ],
                        [
                            'icon' => 'bi-award',
                            'title' => 'Kualitas Terjamin',
                            'desc' => 'Produk sudah teruji dan terinstal di
                berbagai instansi.',
                            'color' => 'bg-warning',
                        ],
                        [
                            'icon' => 'bi-people',
                            'title' => 'Pendampingan & Training',
                            'desc' => 'Pelatihan operator dan dukungan
                pasca-instalasi.',
                            'color' => 'bg-danger',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card shadow-sm h-100 border-0 text-center p-3">
                            <div class="icon mb-3 {{ $service['color'] }} rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width:60px;height:60px;">
                                <i class="bi {{ $service['icon'] }} text-white fs-3"></i>
                            </div>
                            <h5 class="card-title">{{ $service['title'] }}</h5>
                            <p class="card-text">{{ $service['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- /Quick Services Section --> --}}



    

    <!-- About Section -->
    <section id="about" class="section py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('assets/img/team2.jpeg') }}" class="img-fluid rounded shadow" alt="About Us" >
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2>Selayang Pandang</h2>
                    <p>
                        PT Utama Cipta Tata Asri bergerak di bidang Design Engineering & Manufacturing dengan fokus
                        lingkungan.
                        Kami mengkhususkan pada mesin pengolah limbah cair kami berkomitment terhadap lingkungan dan
                        kualitas, menyediakan mesin-mesin inovatif yang telah terpasang di berbagai instansi
                        pemerintahan dan swasta.

                        <br><br><br><br>

                        dengan pengalaman lebih dari 10 tahun, PT Utama Cipta Tata asri terus berinovasi untuk
                        menghadirkan product yang efisien, ramah lingkungan, dan handal yang mendukung layanan medis
                        agar lebih aman dan berkelanjutan
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


<!---cek--->
<section class="why-us-section">
    <div class="containerr">
        <div class="why-item">
            <div class="drop">
                <img src="{{ asset('assets/img/product1.jpeg') }}" alt="Product 1" width="400">
            </div>
            <p class="why-text">IPAL portable kapasitas 1m3, efisien dan hemat ruang</p>
        </div>

        <div class="why-item">
            <div class="drop">
                <img src="{{ asset('assets/img/product2.jpeg') }}" alt="Product 2" width="400">
            </div>
            <p class="why-text">Menggunakan solar cell hybrid hemat energi</p>
        </div>

        <div class="why-item">
            <div class="drop">
                <img src="{{ asset('assets/img/product3.jpeg') }}" alt="Product 3" width="400">
            </div>
            <p class="why-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, atque.</p>
        </div>
        <div class="why-item">
            <div class="drop">
                <img src="{{ asset('assets/img/product4.jpeg') }}" alt="Product 3" width="400">
            </div>
            <p class="why-text">Lorem ipsum dolor sit amet.</p>
        </div>
    </div>
</section>





    {{-- <!-- Featured Products Section (Droplet Style) -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up" class="fw-bold text-primary">Produk Best Seller</h2>
                <p data-aos="fade-up" data-aos-delay="100">Solusi IPAL unggulan yang banyak digunakan instansi medis,
                    industri & pemerintah.</p>
            </div>

            <style>
                .droplet-card {
                    position: relative;
                    background: #ffffff;
                    border: none;
                    padding: 25px 15px 30px;
                    border-radius: 0 0 50% 50% / 0 0 35% 35%;
                    box-shadow: 0 8px 20px rgba(0, 153, 204, 0.2);
                    overflow: hidden;
                    transition: 0.4s;
                }

                .droplet-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 15px 30px rgba(0, 153, 204, 0.35);
                }

                .droplet-image {
                    width: 140px;
                    height: 140px;
                    object-fit: contain;
                    background: #e8f8ff;
                    border-radius: 50%;
                    padding: 15px;
                    margin: 0 auto 15px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: 0.4s;
                }

                .droplet-card:hover .droplet-image {
                    background: #d8f1ff;
                }

                .btn-droplet {
                    border-radius: 30px;
                    background: #0099cc;
                    border: none;
                    padding: 8px 18px;
                    color: #fff;
                    transition: 0.3s;
                }

                .btn-droplet:hover {
                    background: #0077b6;
                    color: white;
                }
            </style>

            <div class="row g-4">
                @php
                    $products = [
                        [
                            'img' => 'ipal_1m3.png',
                            'title' => 'IPAL WT PRO 0041 KAP.1m3',
                            'desc' => 'IPAL portable kapasitas 1m3, efisien dan hemat ruang.',
                        ],
                        [
                            'img' => 'features-2.svg',
                            'title' => 'IPAL WT PRO 004i 3.5m3',
                            'desc' => 'Menggunakan solar cell hybrid hemat energi.',
                        ],
                        [
                            'img' => 'features-3.svg',
                            'title' => 'IPAL Model 003X',
                            'desc' => 'Unit IPAL siap pakai efisiensi tinggi.',
                        ],
                        [
                            'img' => 'features-4.svg',
                            'title' => 'IPAL Model 005Y',
                            'desc' => 'IPAL tahan korosi & ramah lingkungan.',
                        ],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="droplet-card text-center">
                            <img src="{{ asset('assets/img/' . $product['img']) }}" class="droplet-image"
                                alt="{{ $product['title'] }}">
                            <h5 class="fw-bold">{{ $product['title'] }}</h5>
                            <p style="font-size: 14px">{{ $product['desc'] }}</p>
                            <a href="{{ asset('assets/img/' . $product['img']) }}"
                                class="btn-droplet glightbox shadow-sm">🔍 Preview</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

 --}}





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
                        'img' => 'app-1.jpg',
                        'title' => 'Eiger Civilian Hat',
                        'old' => 'Rp179.000',
                        'new' => 'Rp143.200',
                        'discount' => '-20%',
                        'location' => 'Bandung, Indonesia',
                    ],
                    [
                        'img' => 'app-2.jpg',
                        'title' => 'Tas Gunung 45L',
                        'old' => 'Rp650.000',
                        'new' => 'Rp520.000',
                        'discount' => '-20%',
                        'location' => 'Jakarta, Indonesia',
                    ],
                    [
                        'img' => 'app-3.jpg',
                        'title' => 'Sepatu Hiking',
                        'old' => 'Rp899.000',
                        'new' => 'Rp720.000',
                        'discount' => '-20%',
                        'location' => 'Surabaya, Indonesia',
                    ],
                    [
                        'img' => 'app-3.jpg',
                        'title' => 'Jaket Outdoor',
                        'old' => 'Rp450.000',
                        'new' => 'Rp360.000',
                        'discount' => '-20%',
                        'location' => 'Bandung, Indonesia',
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
