<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Source Trucking Academy Tracking Evaluation Page </title>
  <?php
  if(!isset($_SESSION['login_id']))
  header('location:login.php');
  // include('./auth.php'); 
  ?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Source Trucking Academy Evaluation Page</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="../index.php">Home</a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">
        <h1><b>Select the appropriate Student Evaluation</b></h1><br></br>

      <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-green">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="Log_Table/log_info.php">Inside Inspection</a></h4>
            <p class="description">Description: Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.</p>
          </div>
        </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="20"><a href="Log_Table_1/log_info.php">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="Log_Table_1/log_info.php">Outside Inspection: Form A</a></h4>
              <p class="description">Description: Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="20"><a href="Log_Table_2/log_info.php">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="Log_Table_2/log_info.php">Outside Inspection: Form B</a></h4>
              <p class="description">Description: Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="20"><a href="Log_Table_3/log_info.php">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="Log_Table_3/log_info.php">Outside Inspection: Form C (Combination)</a></h4>
              <p class="description">Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="20"><a href="Log_Table_4/log_info.php">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="Log_Table_4/log_info.php">Coupling Systems of Tractor and Trailer</a></h4>
              <p class="description">Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.</p>
            </div>
          </div>

         

        </div>

      </div>
    </section><!-- End Services Section -->


    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Source Trucking Academy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="https://www.sourcetruckingacademy.com/">Source Trucking Academy</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>