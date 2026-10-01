@extends('layouts.app_landing')
@section('title', 'company profile')
@section('content')

    @php
        // Ikon layanan dipilih dari judul layanan (konten tidak berubah)
        $iconFor = function ($title) {
            $t = \Illuminate\Support\Str::lower($title ?? '');
            return match (true) {
                str_contains($t, 'pabrik') || str_contains($t, 'produksi') => 'fa-industry',
                str_contains($t, 'instal') || str_contains($t, 'pasang') => 'fa-screwdriver-wrench',
                str_contains($t, 'maint') || str_contains($t, 'rawat') || str_contains($t, 'service') => 'fa-wrench',
                str_contains($t, 'sewa') || str_contains($t, 'mobile') => 'fa-truck-droplet',
                str_contains($t, 'lab') || str_contains($t, 'uji') => 'fa-flask',
                str_contains($t, 'konsul') || str_contains($t, 'desain') => 'fa-compass-drafting',
                str_contains($t, 'konstruksi') || str_contains($t, 'bangun') => 'fa-helmet-safety',
                default => 'fa-droplet',
            };
        };
    @endphp

    <main class="main">

        {{-- ================= HERO ================= --}}
        <section id="hero" class="hero section dark-background">
            <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                @foreach ($halaman_utama_list as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                        style="background-image: url('{{ asset($item->image) }}');">
                        <div class="container position-relative">
                            <div class="carousel-container">
                                <h2>{{ $item->headline }}</h2>
                                <p>{!! nl2br(e($item->sub_headline)) !!}</p>
                                <div class="hero-actions">
                                    <a href="{{ route('product') }}" class="btn btn-hero">Lihat Produk</a>
                                    <a href="{{ route('contact.index') }}" class="btn btn-hero-ghost">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev" aria-label="Sebelumnya">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next" aria-label="Berikutnya">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </section>

        {{-- ================= TENTANG ================= --}}
        @if (isset($about) && $about)
            <section id="about" class="section">
                <div class="container">
                    <div class="row align-items-center gy-5">
                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="about-media">
                                <img src="{{ asset($about->image) }}" alt="{{ $about->headline ?? 'Tentang kami' }}">
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="fw-bold mb-4">{{ $about->headline ?? 'Selayang Pandang' }}</h2>

                            <p>{!! nl2br(e($aboutPreview)) !!}</p>

                            <div class="perks">
                                <h5>Produk dan fasilitas yang kami sajikan memiliki beberapa keunggulan diantaranya :</h5>
                                <ul class="list-unstyled mb-0">
                                    <li><i class="bi bi-check2-circle text-primary me-2"></i>Instalasi cepat & handal</li>
                                    <li><i class="bi bi-check2-circle text-primary me-2"></i>Pelatihan operator & pendampingan</li>
                                    <li><i class="bi bi-check2-circle text-primary me-2"></i>Produk ramah lingkungan & hemat energi</li>
                                </ul>
                            </div>

                            <a href="{{ route('about') }}" class="btn btn-outline-secondary">read more</a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- ================= VISI & MISI ================= --}}
        <section class="section section-alt">
            <div class="container">
                <div class="section-head" data-aos="fade-up">
                    <h2>Visi & Misi</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card h-100 vm-card">
                            <div class="vm-icon"><i class="fa-solid fa-eye"></i></div>
                            <h5 class="fw-bold">Visi</h5>
                            @if ($visi)
                                <p>{{ $visi->text }}</p>
                            @else
                                <p><em>Belum ada visi di backend.</em></p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 vm-card">
                            <div class="vm-icon"><i class="fa-solid fa-lightbulb"></i></div>
                            <h5 class="fw-bold">Misi</h5>
                            @if ($misi->count())
                                <ul>
                                    @foreach ($misi as $item)
                                        <li><p>{{ $item->text }}</p></li>
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

        {{-- ================= LAYANAN ================= --}}
        <section id="layanan" class="section">
            <div class="container">
                <div class="section-head" data-aos="fade-up">
                    <h2>Layanan Kami</h2>
                </div>

                <div class="row g-4">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <div class="card svc-card lift">
                                <div class="svc-icon"><i class="fas {{ $iconFor($service->title) }}"></i></div>
                                <h4>{{ $service->title }}</h4>
                                <p class="text-muted mt-2 mb-0">{{ $service->description }}</p>
                                <a href="{{ $service->link }}" class="svc-link">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ================= PRODUK ================= --}}
        <section id="catalog" class="section section-alt">
            <div class="container">

                <div class="section-head" data-aos="fade-up">
                    <h2>Produk Kami</h2>
                    <p>Produk unggulan yang kami sediakan</p>
                </div>

                <div class="row g-4" data-aos="fade-up">
                    @forelse($products ?? [] as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 katalog-card lift">

                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/img/no-image.png') }}"
                                    class="card-img-top katalog-img" alt="{{ $product->name ?? 'Product Image' }}" loading="lazy">

                                <div class="card-body d-flex flex-column">
                                    <small class="text-muted">{{ $product->company ?? '-' }}</small>
                                    <h5 class="fw-bold">{{ $product->name ?? '-' }}</h5>
                                    <p class="text-muted small clamp-3">
                                        {{ $product->preview_desc ?? \Illuminate\Support\Str::limit($product->deskripsi ?? '-', 120) }}
                                    </p>
                                    <button class="btn btn-primary mt-auto" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $product->id }}">
                                        Detail Produk
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- MODAL --}}
                        <div class="modal fade" id="detailModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-body p-0">
                                        <div class="row g-0">

                                            <div class="col-md-6">
                                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/img/no-image.png') }}"
                                                    class="w-100 h-100 object-fit-cover" alt="{{ $product->name }}">
                                            </div>

                                            <div class="col-md-6 p-4">
                                                <div class="d-flex justify-content-between align-items-start gap-3">
                                                    <h3 class="fw-bold mb-3">{{ $product->name }}</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>

                                                <div class="mb-3">
                                                    <span class="badge bg-primary">{{ $product->kategori ?? '-' }}</span>
                                                    <span class="badge bg-dark">{{ $product->brand ?? '-' }}</span>
                                                </div>

                                                <p class="text-muted">{{ $product->deskripsi ?? '-' }}</p>

                                                <hr>

                                                <h6 class="fw-bold">Informasi Produk</h6>
                                                <table class="table table-sm">
                                                    <tr><td>Kode Produk</td><td>{{ $product->kode_produk ?? '-' }}</td></tr>
                                                    <tr><td>Brand</td><td>{{ $product->brand ?? '-' }}</td></tr>
                                                    <tr><td>Model</td><td>{{ $product->model_produk ?? '-' }}</td></tr>
                                                    <tr><td>Seri</td><td>{{ $product->seri_produk ?? '-' }}</td></tr>
                                                </table>

                                                @if (!empty($product->spesifikasi))
                                                    <h6 class="fw-bold mt-3">Spesifikasi</h6>
                                                    <p class="small text-muted">{!! nl2br(e($product->spesifikasi)) !!}</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada produk</p>
                        </div>
                    @endforelse
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('e-katalog') }}" class="btn btn-outline-primary">Lihat semua produk</a>
                </div>
            </div>
        </section>

        {{-- ================= LEGALITAS ================= --}}
        <section id="clients" class="clients section legal-band">
            <div class="container">
                <div class="section-head" data-aos="fade-up">
                    <h2>Legalitas & Sertifikasi</h2>
                </div>

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {"delay": 5000},
                        "slidesPerView": "auto",
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
                                <img src="{{ asset('uploads/legalitas/' . $item->image) }}" class="img-fluid" alt="Legalitas">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
