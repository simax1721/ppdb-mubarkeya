<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PPDB Online SMKN 1 Al-Mubarkeya</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('/') }}/mamba/assets/img/logombky2.png" rel="icon">
  <link href="{{ url('/') }}/mamba/assets/img/logombky2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/') }}/mamba/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/mamba/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('/') }}/mamba/assets/css/style.css" rel="stylesheet">

  <style>
    .timeline-horizontal {
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .timeline-horizontal::before {
      content: "";
      position: absolute;
      top: 30px;
      left: 0;
      right: 0;
      height: 2px;
      background-color: #dee2e6; /* garis tengah */
      z-index: 0;
    }

    .timeline-step {
      position: relative;
      text-align: center;
      z-index: 1;
      flex: 1;
    }

    .circle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      font-weight: bold;
      font-size: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .circle:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(52, 58, 64, 0.2);
    }

    .circle.solid {
      background-color: #28a745;  /* abu-abu solid */
      color: #fff;
    }

    .circle.outline {
      border: 3px solid #28a745;
      background-color: white;
      color: #343a40;
    }

    .timeline-label {
      margin-top: 10px;
      font-size: 14px;
      color: #343a40;
    }
   </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  @stack('css')

  <!-- =======================================================
  * Template Name: Mamba - v2.5.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="youtube"><i class="icofont-youtube"></i></a>
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h4 class="font-weight-bolder">
            <a href="{{ url('/') }}" class="d-flex align-items-center">
                <img src="{{ url('/') }}/mamba/assets/img/logombky2.png" alt="">
                <span class="text-uppercase ml-2" style="font-family: Arial, Helvetica, sans-serif">PPDB Online SMKN 1 Al-Mubarkeya</span>
            </a>
        </h4>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ url('/') }}/mamba/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('informasi') }}">Informasi</a></li>
          <li><a href="{{ url('alur') }}">Alur</a></li>
          @if (Auth::user())
          <li class="drop-down"><a href=""><i class="icofont-user"></i> {{ Auth::user()->name }}</a>
            <ul>
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li><a href="{{ url('/profil') }}">Profil Siswa</a></li>
              <li><a href="{{ url('/formulir') }}">Formulir Pendaftaran</a></li>
              <li><a href="{{ url('/pengumumanlulus') }}">Pengumuman Kelulusan</a></li>
              <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Keluar <i class="icofont-logout"></i></a>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="drop-down"><a href="">Pendaftaran</a>
            <ul>
              <li><a href="{{ url('register') }}">Pendaftaran Akun</a></li>
              <li><a href="{{ url('login') }}">Masuk</a></li>
            </ul>
          </li>
          @endif
          {{-- <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li> --}}
          {{-- <li><a href="#contact">Contact Us</a></li> --}}
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  @yield('hero')

  <main id="main">

  @yield('judul-halaman')

  @auth
  <section class="inner-page">
    <div class="container">
  
  
        <div class="timeline-horizontal">
            <div class="timeline-step">
              <a href="{{ url('profil/') }}" id="timeline-1" class="circle outline {{-- solid --}}">1</a>
              <div class="timeline-label">Biodata Siswa</div>
            </div>
            <div class="timeline-step">
              <a href="{{ url('formulir') }}" id="timeline-2" class="circle outline">2</a>
              <div class="timeline-label">Formulir Pendaftaran</div>
            </div>
            <div class="timeline-step">
              <a href="#ujian" id="timeline-3" class="circle outline">3</a>
              <div class="timeline-label">Ujian</div>
            </div>
            <div class="timeline-step">
              <a href="#pengumuman" id="timeline-4" class="circle outline">4</a>
              <div class="timeline-label">Pengumuman</div>
            </div>
            <div class="timeline-step">
              <a href="#daftarulang" id="timeline-5" class="circle outline">5</a>
              <div class="timeline-label">Daftar Ulang</div>
            </div>
          </div>
  
  
  
  
    </div>
  </section>
  @endauth

  @yield('main-content')
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Mamba</h3>
            <p>
              A108 Adam Street <br>
              NY 535022, USA<br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('/') }}/mamba/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/counterup/counterup.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ url('/') }}/mamba/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('/') }}/mamba/assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @stack('scripts')

  <script>
    $(document).ready(function () {
      $.ajax({
        type: "GET",
        url: `{{ url('dashboard-timeline') }}`,
        success: function (response) {
          if (response.timeline1 == 1) {
            $('#timeline-1').removeClass('outline');
            $('#timeline-1').addClass('solid');
          }
          if (response.timeline2 == 1) {
            $('#timeline-2').removeClass('outline');
            $('#timeline-2').addClass('solid');
          }
          if (response.timeline3 == 1) {
            $('#timeline-3').removeClass('outline');
            $('#timeline-3').addClass('solid');
          }
          if (response.timeline4 == 1) {
            $('#timeline-4').removeClass('outline');
            $('#timeline-4').addClass('solid');
          }
          if (response.timeline5 == 1) {
            $('#timeline-5').removeClass('outline');
            $('#timeline-5').addClass('solid');
          }
        }
      });
    });
  </script>

</body>

</html>