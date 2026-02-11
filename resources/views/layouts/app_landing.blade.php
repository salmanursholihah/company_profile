{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Company profile PT Utama Cipta Tata Asri - Ositech </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-...hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    @stack('styles')
    <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-details-page">

    <header id="header" class="header d-flex align-items-center fixed-top header-custom">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ositech</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('product') }}">Product</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('e-katalog') }}">E-katalog</a></li>
                    <li><a href="{{ route('team') }}">Team</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('register') }}">sign up</a></li>
                    <li><a href="{{ route('login') }}">sign in</a></li>


                    <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

        @yield('content')




    <footer id="footer" class="footer dark-background">



        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">PT Utama Cipta Tata Asri </span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02, Magelang, Kec. Magelang Utara, Kota Magelang,
                            Jawa Tengah</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>0831-1666-8809</span></p>
                        <p><strong>Email:</strong> <span>ptutamacta@gmail.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('index') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('product') }}">Product</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">P
                            roduct Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p class="italic">Reliable, Ecodable, and Reasonable</p>
                    <div class="social-links d-flex">
                        <a href="https://www.twitter.com"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/pt_utama_ciptatataasri?igsh=MTc1a3Vnem9qN2NvbQ=="><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@ospod67?_t=ZS-8ycKl7yOd2G&_r=1"><i
                                class="bi bi-tiktok"></i></a>
                        <a href="https://youtube.com/@ospod-milos?si=pJO2FPcFW9RLsaY9"><i class="bi bi-youtube"></i></a>

                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">UCTA by ositech</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>



 --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Company Profile PT Utama Cipta Tata Asri - Ositech</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="blog-details-page">

    <!-- ================= HEADER ================= -->
    <header id="header" class="header d-flex align-items-center fixed-top header-custom">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('index') }}" class="logo d-flex align-items-center">
                <h1 class="sitename">Ositech</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('product') }}">Product</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('e-katalog') }}">E-katalog</a></li>
                    <li><a href="{{ route('team') }}">Team</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                    <li><a href="{{ route('login') }}">Sign In</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
    <!-- =============== END HEADER ================= -->



    <!-- =============== MAIN CONTENT ================= -->
    <main style="margin-top: 90px;">
        @yield('content')
    </main>
    <!-- =============== END MAIN ================= -->


    <!--footer manual code-->
    <!-- ================= FOOTER ================= -->
    {{-- <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('index') }}" class="d-flex align-items-center">
                        <span class="sitename">PT Utama Cipta Tata Asri</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02, Magelang, Magelang Utara, Jawa Tengah</p>
                        <p class="mt-3"><strong>Phone:</strong> 0831-1666-8809</p>
                        <p><strong>Email:</strong> ptutamacta@gmail.com</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('index') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">About</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('product') }}">Product</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p class="italic">Reliable, Ecodable, and Reasonable</p>
                    <div class="social-links d-flex">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/pt_utama_ciptatataasri?igsh=MTc1a3Vnem9qN2NvbQ=="><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@ospod67?_r=1&_t=ZS-91w18C0s2NU"><i class="bi bi-tiktok"></i></a>
                        <a href="https://www.youtube.com/@ospod-milos"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© Copyright <strong class="sitename">UCTA by Ositech</strong>. All Rights Reserved</p>
        </div>

    </footer> --}}

    {{-- FOOTER IMAGE TOP --}}
    @if (isset($footerImage))
        <div class="footer-top-image">
            <img src="{{ asset('storage/' . $footerImage->image_path) }}" class="img-fluid w-100"
                style="max-height:250px; object-fit:cover;">
        </div>
    @endif


    <!--footer crud-->
    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">

                {{-- COMPANY --}}
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('index') }}" class="d-flex align-items-center">
                        <span class="sitename">
                            {{ $footer->company_name ?? 'PT Utama Cipta Tata Asri' }}
                        </span>
                    </a>

                    <div class="footer-contact pt-3">
                        <p>{{ $footer->address }}</p>

                        <p class="mt-3">
                            <strong>Phone:</strong> {{ $footer->phone }}
                        </p>

                        <p>
                            <strong>Email:</strong> {{ $footer->email }}
                        </p>
                    </div>
                </div>

                {{-- USEFUL LINKS --}}
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>

                        @foreach ($footer->useful_links ?? [] as $link)
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ $link['url'] }}">
                                    {{ $link['name'] }}
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
                                <a href="#">
                                    {{ is_array($service) ? $service['name'] : $service }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                {{-- SOCIAL --}}
                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>

                    <p class="italic">
                        {{ $footer->tagline }}
                    </p>

                    <div class="social-links d-flex">

                        @php
                            $icons = [
                                'twitter' => 'twitter-x',
                                'facebook' => 'facebook',
                                'instagram' => 'instagram',
                                'tiktok' => 'tiktok',
                                'youtube' => 'youtube',
                                'linkedin' => 'linkedin',
                            ];
                        @endphp

                        @foreach ($footer->social_links ?? [] as $platform => $url)
                            <a href="{{ $url }}">
                                <i class="bi bi-{{ $icons[$platform] ?? $platform }}"></i>
                            </a>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>

        {{-- COPYRIGHT --}}
        <div class="container copyright text-center mt-4">
            <p>
                {{ $footer->copyright }}
            </p>
        </div>

    </footer>

    <!-- =============== END FOOTER ================= -->



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
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

</body>

</html>
