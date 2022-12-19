<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Innocent Chisanga</title>
  <meta content="" name="I am a business Oriented full-stack web developer, with 4 years of industrial experience. I have worked with several tech startup businesses and government institutions, were i have been exposed to a number of technologies that can help struggling companies, small businesses and government institutions back from the brink.">
  <meta content="" name="Innocent chisanga,Software Developer,web developer,Maluine Vector">

  <!-- Favicons -->
  <link href="<?=base_url()?>/public/assets1/img/favicon1.png" rel="icon">
  <link href="<?=base_url()?>/public/assets1/img/apple-touch-icon1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>/public/assets1/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>/public/assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/public/assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>/public/assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/public/assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>/public/assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>/public/assets1/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume - v4.7.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
        <!-- <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>My Works</span></a></li> -->
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        <li>
          <?php if ($userdata == null || $userdata == 0): ?>
          <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Go Back to Main System</span></a>
        <?php else: ?>
          <a href="<?=base_url()?>/" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Go Back to Main System</span></a>
        <?php endif ?>
        </li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Chisanga Innocent</h1>
      <p>I'm a <span class="typed" data-typed-items="Web Designer, Software Developer, Freelancer, Web Developer"></span></p>
      <div class="social-links">
        <a href="https://twitter.com/Inno_Maluine" target="_blank" class="twitter" title="Twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/maluine.ic.167" target="_blank" class="facebook" title="Facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.linkedin.com/in/chisanga-innocent-29940215b/" target="_blank" class="linkedin" title="Linkedin"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/lnnocentchisanga3" target="_blank" class="github" title="Github"><i class="bx bxl-github"></i></a>
        <a href="#" class="github" target="_blank" title="dev"><i class="bx bxl-dev"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>A little about Me</h2>
          <p>I am a business Oriented Full-Stack web and Software developer, with 5 years of industrial experience. I have worked with several tech startup businesses and government institutions, were i have been exposed to a number of technologies that can help struggling companies, small businesses and government institutions back from the brink.</p>
        </div>

      </div>
    </section><!-- End About Section -->
    </section> <!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>My Works</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

 <div class="col-lg-6 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?=base_url()?>/public/assets1/img/portfolio/donor.png" class="img-fluid" alt="Innocent Chisanga's Works">
              <div class="portfolio-info">
                <h4>Donor Data Clerk Journal</h4>
                <p>A system that is used to keep blood donor's records</p>
                <div class="portfolio-links">
                  <a href="<?=base_url()?>/public/assets1/img/portfolio/donor.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="<?=base_url()?>/public/assets1/img/portfolio/donor.png" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-lg-6 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?=base_url()?>/public/assets1/img/portfolio/kat.png" class="img-fluid" alt="Innocent Chisanga's Works">
              <div class="portfolio-info">
                <h4>My Money Manager</h4>
                <p>A Web Application</p>
                <div class="portfolio-links">
                  <a href="<?=base_url()?>/public/assets1/img/portfolio/kat.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="http://chisfamstores.rf.gd" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        <!-- </div>

      </div>
    </section> End Portfolio Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Feel Free To Contact me</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>2002B Riverrest, Kasama Zambia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><a href="mailto:chisangainnocent@outlook.com">chisangainnocent@outlook.com</a></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><a href="tel:+260979023093">+260979 0230 93</a>, <a href="tel:+260966367116">+260966 3671 16</a></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" id="contact">

            <?=form_open()?>
              <div class="row">
                <?php if (session()->getTempdata('Success')): ?>
                  <div class="alert alert-success col-md-12">
                    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                   <strong>Success !</strong> <?=session()->getTempdata('Success');?>
                  </div>
                <?php endif ?>

                 <?php if (session()->getTempdata('error')): ?>
                  <div class="alert alert-danger col-md-12">
                    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                   <strong>Warning !</strong> <?=session()->getTempdata('error');?>
                  </div>
                <?php endif ?>

                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <!-- <div class="my-3" >
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit" class="btn btn-primary btn-rounded btn-lg my-4"  name="send">Send Message</button></div>
            <?=form_close()?>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Chisanga Innocent</h3>
      <p>I will be so happy to hear from you.</p><h4 style="font-size: 2em; padding-bottom: 2rem;">🙂</h4>
      <div class="social-links">
        <a href="https://twitter.com/Inno_Maluine" class="twitter" title="Twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/maluine.ic.167" target="_blank" class="facebook" title="Facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.linkedin.com/in/chisanga-innocent-29940215b/" target="_blank" class="linkedin" title="Linkedin"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/lnnocentchisanga3" class="github" title="Github" target="_blank"><i class="bx bxl-github"></i></a>
      </div>
      <div class="copyright"><script> document.write(new Date().getFullYear()); </script>
        &copy; Copyright <strong><span>Chisanga Innocent</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: [license-url] -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>/public/assets1/vendor/purecounter/purecounter.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/aos/aos.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/typed.js/typed.min.js"></script>
  <script src="<?=base_url()?>/public/assets1/vendor/waypoints/noframework.waypoints.js"></script>
 <!--  <script src="<?=base_url()?>/public/assets1/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>/public/assets1/js/main.js"></script>

  <script>
    // var debug = "";
    // console.log(debug);
  </script>

</body>

</html>