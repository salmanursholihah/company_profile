 @extends('layouts.app_landing')
 <main class="main">

     <!-- Page Title -->
     <div class="page-title dark-background">
         <div class="container position-relative">
             <h1>Contact</h1>
             <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                 molestias.</p>
             <nav class="breadcrumbs">
                 <ol>
                     <li class="current">Home</li>
                     <li class="current">Contact</li>
                 </ol>
             </nav>
         </div>
     </div><!-- End Page Title -->

     <!-- Contact Section -->
     <section id="contact" class="contact section">

         <div class="container" data-aos="fade-up" data-aos-delay="100">

             <div class="row gy-4">
                 <div class="col-lg-6 ">
                     <div class="row gy-4">

                         <div class="col-lg-12">
                             <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                 data-aos="fade-up" data-aos-delay="200">
                                 <i class="bi bi-geo-alt"></i>
                                 <h3>Address</h3>
                                 <p>Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02, Magelang, Kec. Magelang Utara, Kota
                                     Magelang, Jawa Tengah</p>
                             </div>
                         </div><!-- End Info Item -->

                         <div class="col-md-6">
                             <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                 data-aos="fade-up" data-aos-delay="300">
                                 <i class="bi bi-telephone"></i>
                                 <h3>Call Us</h3>
                                 <p>+62 8123 457 689</p>
                             </div>
                         </div><!-- End Info Item -->

                         <div class="col-md-6">
                             <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                 data-aos="fade-up" data-aos-delay="400">
                                 <i class="bi bi-envelope"></i>
                                 <h3>Email Us</h3>
                                 <p>utamacta@gmail.com</p>
                             </div>
                         </div><!-- End Info Item -->

                     </div>
                 </div>

                 <div class="col-lg-6">
                     <form action="{{ route('contact.store') }}" method="POST" class="php-email-form" data-aos="fade-up"
                         data-aos-delay="500">
                          @csrf
                         <div class="row gy-4">

                             <div class="col-md-6">
                                 <input type="text" name="name" class="form-control" placeholder="Your Name"
                                     required="">
                             </div>

                             <div class="col-md-6 ">
                                 <input type="email" class="form-control" name="email" placeholder="Your Email"
                                     required="">
                             </div>

                             <div class="col-md-12">
                                 <input type="text" class="form-control" name="subject" placeholder="Subject"
                                     required="">
                             </div>

                             <div class="col-md-12">
                                 <textarea class="form-control" name="message" rows="4" placeholder="Message"
                                     required=""></textarea>
                             </div>

                             <div class="col-md-12 text-center">
                                 <div class="loading">Loading</div>
                                 <div class="error-message"></div>
                                 <div class="sent-message">Your message has been sent. Thank you!</div>

                                 <button type="submit">Send Message</button>
                             </div>

                         </div>
                     </form>
                 </div><!-- End Contact Form -->
                 

             </div>

         </div>

         <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
             <iframe style="border:0; width: 100%; height: 370px;"
                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d161536.54220140062!2d110.08231241640622!3d-7.465586399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f06c1ce38eb%3A0xb67783d2e0568c26!2sPJKA%204%20(BKW)!5e1!3m2!1sid!2sid!4v1755760135754!5m2!1sid!2sid"
                 width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                 referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div><!-- End Google Maps -->

     </section><!-- /Contact Section -->

 </main>