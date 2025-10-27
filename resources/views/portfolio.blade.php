   @extends('layouts.app_landing')


   <main class="main">

       <!-- Page Title -->
       <div class="page-title dark-background">
           <div class="container position-relative">
               <h1>Portfolio</h1>
               <p>solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
               <nav class="breadcrumbs">
                   <ol>
                       <li class="current">Home</li>
                       <li class="current">Portfolio</li>
                   </ol>
               </nav>
           </div>
       </div><!-- End Page Title -->

       <!-- Portfolio Section -->
       <section id="portfolio" class="portfolio section">

           <div class="container">

               <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                   <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                       <li data-filter="*" class="filter-active">All</li>
                       {{-- <li data-filter=".filter-app">team</li> --}}
                       <li data-filter=".filter-app">Our Customers</li>
                       <li data-filter=".filter-product">Product</li>
                       <li data-filter=".filter-branding">technical</li>
                       {{-- <li data-filter=".filter-books">Books</li> --}}
                   </ul><!-- End Portfolio Filters -->

                   <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                       {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-naja.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-naja.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-dwi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-dwi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-diesta.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-diesta.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-salma.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-salma.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-nizar.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-nizar.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-rudi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-rudi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-nasrudin.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-nasrudin.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-dicky.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-dicky.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-abi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-abi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team1.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team2.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team2.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team3.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item --> --}}

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 1</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1.jpeg" title="Product 1"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->




                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product2.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 2</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product2.jpeg" title="Product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->






                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 3</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product3.jpeg" title="Product 3"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->


                       {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 3</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product3.jpeg" title="Product 3"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item --> --}}







                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (1).JPG" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (1).JPG" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (2).JPG" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (2).JPG" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (1).png" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (1).png" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (2).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (2).jpeg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (3).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (3).jpeg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (3).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (3).jpg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->



                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (4).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (4).jpg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (4).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (4).jpeg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (5).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (5).jpg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (5).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>our customer</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (5).jpeg" title="app 2"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (6).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (6).jpg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (6).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (6).jpeg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (7).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (7).jpg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (7).jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>produc</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (7).jpeg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (9).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (9).jpg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (10).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>product</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (10).jpg" title="product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1 (11).jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 4</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1 (11).jpg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->



                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/our-customer1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/our-customer1.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->



                   </div><!-- End Portfolio Container -->

               </div>

           </div>

       </section><!-- /Portfolio Section -->

   </main>
