<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ isset($title) ? $title : 'Aminah Homepage' }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('') }}/img/Aminah1.png" rel="icon">
  <link href="{{ asset('') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('') }}/template/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('') }}/template/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('') }}/template/css/style.css" rel="stylesheet">

  <!-- =======================================================
    * Template Name: Mentor - v4.7.0
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
  @include('layouts.landingpage.navbar')

  @yield('content')
  {{-- BEGIN FOOTER --}}
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <img src="{{ asset('') }}/img/Aminah2.png" width="200" alt="">
        <p>
          Jakarta Barat, DKI Jakarta, Indonesia <br><br>
          <strong>Phone:</strong> 085243887051 <br>
          <strong>Email:</strong> arimbimega1@gmail.com<br>
        </p>
      </div>
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>
  {{-- END FOOTER --}}

  <div id="preloader"></div>
  <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template') }}/vendor/purecounter/purecounter.js"></script>
  <script src="{{ asset('template') }}/vendor/aos/aos.js"></script>
  <script src="{{ asset('template') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('template') }}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('template') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template') }}/js/main.js"></script>

</body>

</html>
