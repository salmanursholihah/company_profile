 @extends('layouts.app_landing')

 <main class="main">

     <!-- Page Title -->
     <div class="page-title dark-background">
         <div class="container position-relative">
             <h1>About</h1>
             solusi terpercaya pengelolaan limbah cair yang ramah lingkungan
             <nav class="breadcrumbs">
                 <ol>
                     <li class="current">Home</li>
                     <li class="current">About</li>
                 </ol>
             </nav>
         </div>
     </div><!-- End Page Title -->

     <!-- About Section -->
     <section id="about" class="about section">

         <div class="container">

             <div class="row gy-4">
                 {{-- <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                     <img src="assets/img/team2.jpeg" class="img-fluid" alt="">
                     <a href="https://www.youtube.com/watch?v=HoDKTWGVqmw" class="glightbox pulsating-play-btn"></a>
                 </div> --}}
                 {{-- <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                     <h3>Selayang pandang </h3>
                     <p>
                         PT Utama Cipta Tata Asri merupakan perusahaan manufaktur yang bergerak di bidang rekayasa
                         lingkungan dengan fokus utama pada pengolahan air limbah (Wastewater Treatment) dan sistem IPAL
                         (Instalasi Pengolahan Air Limbah). Sebagai produsen IPAL terpercaya, kami menghadirkan
                         rangkaian solusi pengolahan limbah yang inovatif, efisien, dan ramah lingkungan. mencakup
                         produksi, instalasi, konstruksi, operasional, hingga maintenance.
                         <br><br>
                         Kami menyediakan solusi komprehensif untuk berbagai sektor, antara lain:
                         <br>
                         - Limbah medis (rumah sakit, klinik, laboratorium kesehatan, dan fasilitas kesehatan lainnya),
                         <br>
                         - Limbah industri (makanan dan minuman, kimia, farmasi, peternakan, dan manufaktur).
                         <br><br>
                         Setiap unit IPAL yang kami produksi dikembangkan sesuai standar baku mutu lingkungan
                         berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan (PerMen LHK), serta mengacu pada
                         standar internasional seperti WHO dan EPA, guna memastikan hasil olahan limbah aman, stabil,
                         dan tidak mencemari lingkungan.
                         <br><br>
                         Dengan pengalaman lebih dari 10 tahun dan dukungan tenaga ahli profesional, PT Utama Cipta Tata
                         Asri terus berinovasi untuk menghadirkan produk yang efisien, ramah lingkungan, dan handal yang
                         mendukung layanan medis agar lebih aman dan berkelanjutan.
                         <br><br>
                         Sebagai bentuk komitmen kami terhadap kualitas, PT Utama Cipta Tata Asri mengimplementasikan
                         filosofi Reliable, Ecolable, and Reasonable dalam seluruh proses pengembangan produk.
                         <br><br>
                         - Reliable: Sistem IPAL dirancang dengan tingkat kehandalan tinggi, mampu beroperasi secara
                         konsisten selama 24 jam tanpa memerlukan pendampingan operator yang stand by.
                         <br><br>
                         - Ecolable: Hasil kerja produk kami terbukti ramah lingkungan karena tidak menggunakan bahan
                         kimia berbahaya dalam proses pengolahannya, sehingga aman bagi operator maupun lingkungan.
                         Sebagai gantinya, kami menerapkan system Osmosis(oksidasi ozon) yang mampu meniru proses alami
                         dalam pengolahan air, menghasilkan kualitas air olahan yang lebih stabil, aman, dan memenuhi
                         standar baku mutu.
                         <br><br>
                         - Reasonable: Setiap produk dikembangkan untuk mencapai efisiensi maksimal dengan biaya
                         operasional yang rendah, membantu perusahaan mencapai target efisiensi tanpa mengorbankan
                         kualitas.
                         <br><br>
                         Selain menjadi produsen IPAL, kami juga berperan sebagai mitra strategis bagi perusahaan,
                         pemerintah daerah, dan lembaga kesehatan dalam mewujudkan pengelolaan limbah yang sesuai
                         regulasi dan berkelanjutan. Produk dan layanan kami dirancang untuk mendukung implementasi
                         kesehatan lingkungan, keamanan operasional, serta tanggung jawab sosial perusahaan (CSR).
                         <br><br>
                         Kami meyakini bahwa ketersediaan air bersih dan lingkungan yang sehat adalah kebutuhan
                         fundamental bagi keberlangsungan hidup manusia dan masa depan generasi berikutnya. Oleh karena
                         itu, PT Utama Cipta Tata Asri berkomitmen untuk terus menghadirkan solusi rekayasa lingkungan
                         yang memberikan manfaat nyata, berdaya guna, dan berorientasi masa depan.

                     </p>
                     <!-- <ul>
                         <li><i class="bi bi-check2-all"></i> <span>Instalasi cepat & handal.</span></li>
                         <li><i class="bi bi-check2-all"></i> <span>Pelatihan operator &? pendampingan.</span></li>
                         <li><i class="bi bi-check2-all"></i> <span>product yang ramah lingkungan dan hemat
                                 energi.</span></li>
                     </ul> -->
                     {{-- <p>
                         Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                         in voluptate
                         velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                         proident
                     </p> --}}
                 {{-- </div>  --}}
                 {{-- About Section (safe) --}}
                 @foreach ($abouts as $about)
                     <section id="about" class="section py-5">
                         <div class="container">
                             <div class="row align-items-start gy-5">

                                 <!-- IMAGE -->
                                 <div class="col-lg-6" data-aos="fade-right">
                                     <img src="{{ asset($about->image) }}" class="img-fluid rounded shadow-lg w-100"
                                         alt="About Image">
                                 </div>

                                 <!-- CONTENT -->
                                 <div class="col-lg-6" data-aos="fade-left">

                                     <h2 class="fw-bold mb-4">
                                         {{ $about->headline ?? 'Selayang Pandang' }}
                                     </h2>

                                     <p class="text-muted mb-4">
                                         {!! nl2br(e(Str::limit(strip_tags($about->description), 5000))) !!}
                                     </p>

                                     <h5 class="fw-semibold mb-3">
                                         Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan
                                         diantaranya:
                                     </h5>

                                     <ul class="list-unstyled">
                                         <li class="mb-2">
                                             <i class="bi bi-check2-circle text-primary me-2"></i>
                                             Instalasi cepat & handal
                                         </li>
                                         <li class="mb-2">
                                             <i class="bi bi-check2-circle text-primary me-2"></i>
                                             Pelatihan operator & pendampingan
                                         </li>
                                         <li class="mb-2">
                                             <i class="bi bi-check2-circle text-primary me-2"></i>
                                             Produk ramah lingkungan & hemat energi
                                         </li>
                                     </ul>

                                 </div>

                             </div>
                         </div>
                     </section>
                 @endforeach


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



                 <!-- legalitas Accordion -->
                 <section class="py-5 bg-light">
                     <div class="container">
                         <h2 class="fw-bold mb-4 text-center">legalitas & Sertifikasi</h2>
                         <p>Klaim atas kualitas produk IPAL kami didukung oleh berbagai sertifikasi resmi yang
                             memastikan performa,
                             keamanan, dan mutu sesuai standar nasional maupun internasional. Setiap unit IPAL telah
                             melalui
                             serangkaian uji fungsi dan uji kualitas yang ketat, serta memperoleh pengakuan seperti
                             sertifikasi ISO
                             sebagai standar manajemen mutu, sertifikasi BSN yang menjamin kesesuaian terhadap Standar
                             Nasional
                             Indonesia, dan sertifikasi TKDN yang membuktikan besarnya kandungan komponen dalam negeri
                             pada produk
                             kami. Dengan kelengkapan sertifikasi tersebut, produk IPAL kami tidak hanya teruji handal
                             dan efisien,
                             tetapi juga memenuhi persyaratan regulasi, audit teknis, serta kebutuhan proyek pemerintah
                             maupun
                             swasta.</p>
                         <br><br>
                         <div class="accordion" id="legalitasAccordion">
                             <div class="accordion-item">
                                 <h2 class="accordion-header">
                                     <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                         data-bs-target="#akta">
                                         Akta Pendirian
                                     </button>
                                 </h2>
                                 <div id="akta" class="accordion-collapse collapse show"
                                     data-bs-parent="#legalitasAccordion">
                                     <div class="accordion-body">AHU PT Utama Cipta Tata Asri</div>
                                     <img src="" alt="gambar sertifikat">
                                     <div class="accordion-body">Nomor induk berusaha (NIB)</div>
                                     <img src="" alt="gambar sertifikat">
                                 </div>
                             </div>

                             <div class="accordion-item">
                                 <h2 class="accordion-header">
                                     <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                         data-bs-target="#legalitas">
                                         legalitas
                                     </button>
                                 </h2>
                                 <div id="legalitas" class="accordion-collapse collapse show"
                                     data-bs-parent="#legalitasAccordion">
                                     <div class="accordion-body">Sertifikat Hak Paten</div>
                                     <img src="" alt="gambar sertifikat">
                                     <div class="accordion-body">Sertifikat Merek</div>
                                     <img src="" alt="gambar sertifikat">
                                     <div class="accordion-body">Sertifikat Merek</div>
                                     <img src="" alt="gambar sertifikat">
                                 </div>
                             </div>

                             <div class="accordion-item">
                                 <h2 class="accordion-header">
                                     <button class="accordion-button collapsed fw-bold" type="button"
                                         data-bs-toggle="collapse" data-bs-target="#sertifikat">
                                         Sertifikat SNI & ISO
                                     </button>
                                 </h2>
                                 <div id="sertifikat" class="accordion-collapse collapse"
                                     data-bs-parent="#legalitasAccordion">
                                     <div class="accordion-body">
                                         <ul>
                                             <li>ISO 9001:2015</li>
                                             <img src="" alt="gambar sertifikat">
                                             <li>SNI 7504:2011</li>
                                             <img src="" alt="gambar sertifikat">
                                             <li>SNI_OSITECH_MINIIPAL_2019</li>
                                             <img src="" alt="gambar sertifikat">
                                         </ul>
                                     </div>
                                 </div>
                             </div>

                             <div class="accordion-item">
                                 <div class="accordion-item">
                                     <h2 class="accordion-header">
                                         <button class="accordion-button fw-bold" type="button"
                                             data-bs-toggle="collapse" data-bs-target="#legalitas">
                                             TKDN
                                         </button>
                                     </h2>
                                     <div id="legalitas" class="accordion-collapse collapse show"
                                         data-bs-parent="#legalitasAccordion">
                                         <div class="accordion-body">TKDN</div>
                                         <img src="" alt="gambar sertifikat">

                                     </div>
                                 </div>
                                 <!-- Tambahkan item lain sesuai kebutuhan -->
                             </div>
                         </div>
                 </section>






                 <!--hasil uji lab-->
                 <section>
                     <section id="hasil-uji-lab" class="py-5 bg-light">
                         <div class="container">
                             <div class="row align-items-center">

                                 <!-- Text Content -->
                                 <div class="col-lg-7" data-aos="fade-right">
                                     <h3 class="fw-bold mb-3">Hasil Uji Laboratorium</h3>
                                     <p class="mb-4">
                                         <strong>1.</strong> Baku Mutu Air hasil proses <strong>MINI IPAL</strong> ini
                                         sudah sesuai
                                         dengan
                                         <em>PERMEN LINGKUNGAN HIDUP DAN KEHUTANAN REPUBLIK INDONESIA
                                             NOMOR P.68/Menlhk/Setjen/Kum.1/8/2016</em> tentang
                                         <strong>Baku Mutu Air Limbah Domestik</strong>.
                                     </p>
                                     <p class="mb-4">
                                         <strong>2.</strong> Kami selalu konsisten melakukan pengujian terlebih dahulu
                                         ke
                                         <strong>laboratorium terakreditasi KAN</strong> sebelum produk dilepas ke
                                         pasaran.
                                     </p>
                                 </div>

                                 <!-- Image -->
                                 <div class="col-lg-5 text-center" data-aos="fade-left">
                                     <img src="assets/img/sertifikat.png" alt="Sertifikat hasil instalasi"
                                         class="img-fluid rounded shadow">
                                     <p class="mt-2 text-muted"><em>Contoh sertifikat hasil uji</em></p>
                                 </div>

                             </div>
                         </div>
                     </section>


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
                         },
                         "992": {
                             "slidesPerView": 6,
                             "spaceBetween": 120
                         }
                     }
                 }
                 </script>
                                 <div class="swiper-wrapper align-items-center">
                                     <div class="swiper-slide"><img src="assets/img/clients/rumah_sakit.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/puskesmas.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/restoran.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/klinik.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/farmasi.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/laborat.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                     <div class="swiper-slide"><img src="assets/img/clients/kimia.jpeg"
                                             class="img-fluid" alt="">
                                     </div>
                                 </div>
                             </div>

                         </div>

                     </section><!-- /Clients Section -->

                     <!-- Testimonials Section -->
                     {{-- <section id="testimonials" class="testimonials section">

             <!-- Section Title -->
             <div class="container section-title" data-aos="fade-up">
                 <h2>Testimonials</h2>
                 <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
             </div><!-- End Section Title -->

             <div class="container" data-aos="fade-up" data-aos-delay="100">

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
                     }
                 }
                 </script>
                     <div class="swiper-wrapper">

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni1.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>Saul alexandra</h3>
                                 <h4>Ceo &amp; Founder</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                         suscipit
                                         rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen
                                         aliquam,
                                         risus at semper.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni2.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>Sara Wilsson</h3>
                                 <h4>Designer</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                         quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat
                                         irure
                                         amet legam anim culpa.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni3.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>Jmatt brandon</h3>
                                 <h4>Store Owner</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                         quem
                                         veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis
                                         sint
                                         minim.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni4.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>Jenna karlis</h3>
                                 <h4>Freelancer</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                         minim
                                         fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore
                                         quem dolore labore illum veniam.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->

                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni5.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>John Larson</h3>
                                 <h4>Entrepreneur</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                         noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam
                                         esse veniam culpa fore nisi cillum quid.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->


                         <div class="swiper-slide">
                             <div class="testimonial-item">
                                 <img src="assets/img/testimonials/testimoni6.jpeg" class="testimonial-img"
                                     alt="">
                                 <h3>Jonathan</h3>
                                 <h4>Entrepreneur</h4>
                                 <div class="stars">
                                     <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                         class="bi bi-star-fill"></i>
                                 </div>
                                 <p>
                                     <i class="bi bi-quote quote-icon-left"></i>
                                     <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                         noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam
                                         esse veniam culpa fore nisi cillum quid.</span>
                                     <i class="bi bi-quote quote-icon-right"></i>
                                 </p>
                             </div>
                         </div><!-- End testimonial item -->

                     </div>
                     <div class="swiper-pagination"></div>
                 </div>

             </div>

         </section><!-- /Testimonials Section -->
 --}}
 </main>
