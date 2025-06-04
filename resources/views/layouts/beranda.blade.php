<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPMB Online SMKN 1 Al-Mubarkeya</title>

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
        <i class="icofont-envelope"></i><a href="mailto:smk.mubarkeya@gmail.com">smk.mubarkeya@gmail.com</a>
        <i class="icofont-phone"></i> 0651-8071002
      </div>
      <div class="social-links float-right">
        <a target="_blank" href="https://youtube.com/@smkn1mubarkeya?si=Qi7r8a3AUA2lFDeh" class="youtube"><i class="icofont-youtube"></i></a>
        <a target="_blank" href="https://www.facebook.com/share/1ZTY4htV8Z/" class="facebook"><i class="icofont-facebook"></i></a>
        <a target="_blank" href="https://www.instagram.com/smkn1mubarkeya?igsh=ZmNhbHRwZzdsOHJ1" class="instagram"><i class="icofont-instagram"></i></a>
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
                <span class="text-uppercase ml-2" style="font-family: Arial, Helvetica, sans-serif">SPMB Online SMKN 1 Al-Mubarkeya</span>
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
    @if ( url()->current() == url('/') || url()->current() == url('/informasi') || url()->current() == url('/alur'))
    @else
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
                <a href="{{  url('/pengumumanlulus') }}" id="timeline-4" class="circle outline">4</a>
                <div class="timeline-label">Pengumuman</div>
              </div>
              <div class="timeline-step">
                <a href="{{  url('/daftarulang') }}" id="timeline-5" class="circle outline">5</a>
                <div class="timeline-label">Daftar Ulang</div>
              </div>
            </div>
      </div>
    </section>
    @endif
  @endauth

  @yield('main-content')
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3><img src="{{ url('Logotitlemubarkeya.png') }}" alt="" class="" style="width: 80%"></h3>
            <p>
               Kayee Lee, Kec. Ingin Jaya, <br> Kabupaten Aceh Besar, Aceh 23230<br><br>
              <strong>Phone:</strong> 0651-8071002<br>
              <strong>Email:</strong> smk.mubarkeya@gmail.com<br>
            </p>
            <div class="social-links mt-3">
              <a target="_blank" href="https://youtube.com/@smkn1mubarkeya?si=Qi7r8a3AUA2lFDeh" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a target="_blank" href="https://www.facebook.com/share/1ZTY4htV8Z/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a target="_blank" href="https://www.instagram.com/smkn1mubarkeya?igsh=ZmNhbHRwZzdsOHJ1" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Link Yang Bisa Digunakan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/informasi') }}">Informasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/alur') }}">Alur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/register') }}">Pendaftaran Akun</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/login') }}">Masuk</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Bidang Keahlian</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik Jaringan Komputer dan Telekomunikasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pengembangan Perangkat Lunak dan Gim</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Akuntansi dan Keuangan Lembaga</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Desain Pemodelan dan Informasi Bangunan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik Otomotif</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kuliner</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Busana</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SPMB ONLINE SMKN 1 AL-MUBARKEYA</span></strong>. All Rights Reserved
      </div>
      {{-- <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> --}}
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

  @auth
  <script>

    var timeline1 = '';
    var timeline2 = '';
    var timeline3 = '';
    var timeline4 = '';
    var timeline5 = '';

    $(document).ready(function () {
      var tgl_sekarang = new Date();
      $currentUrl = window.location.href;
      $.ajax({
        type: "GET",
        url: `{{ url('dashboard-timeline') }}`,
        success: function (response) {

          if ($currentUrl == `{{ url('profil') }}` || $currentUrl == `{{ url('profil/biodata') }}`) {
            var tgl_mulai = new Date(response.timelineWaktu[0].tgl_mulai);
            var tgl_selesai = new Date(response.timelineWaktu[0].tgl_selesai);
            if (tgl_sekarang >= tgl_mulai && tgl_sekarang <= tgl_selesai) {
              $('#save').removeClass('disabled');
            }
          }

          if ($currentUrl == `{{ url('formulir') }}`) {
            var tgl_mulai = new Date(response.timelineWaktu[1].tgl_mulai);
            var tgl_selesai = new Date(response.timelineWaktu[1].tgl_selesai);
            if (tgl_sekarang >= tgl_mulai && tgl_sekarang <= tgl_selesai) {
              $('#save').removeClass('disabled');
            }
          }
          
          if ($currentUrl == `{{ url('pengumumanlulus') }}`) {
            var tgl_mulai = new Date(response.timelineWaktu[3].tgl_mulai);
            var tgl_selesai = new Date(response.timelineWaktu[3].tgl_selesai);
            if (tgl_sekarang >= tgl_mulai) {
              $('#preview-formulir').removeClass('d-none');
            }
          }
          
          if ($currentUrl == `{{ url('daftarulang') }}`) {
            var tgl_mulai = new Date(response.timelineWaktu[4].tgl_mulai);
            var tgl_selesai = new Date(response.timelineWaktu[4].tgl_selesai);
            if (tgl_sekarang >= tgl_mulai && tgl_sekarang <= tgl_selesai) {
              $('#save').removeClass('disabled');
            }
          }

          if (response.ceklulus == 0) {
            $('#timeline-5').attr('href', '#');
          }


          if (response.timelineStatus.timeline1 == 1) {
            $('#timeline-1').removeClass('outline');
            $('#timeline-1').addClass('solid');
          }
          if (response.timelineStatus.timeline2 == 1) {
            $('#timeline-2').removeClass('outline');
            $('#timeline-2').addClass('solid');
          }
          if (response.timelineStatus.timeline3 == 1) {
            $('#timeline-3').removeClass('outline');
            $('#timeline-3').addClass('solid');
          }
          if (response.timelineStatus.timeline4 == 1) {
            $('#timeline-4').removeClass('outline');
            $('#timeline-4').addClass('solid');
          }
          if (response.timelineStatus.timeline5 == 1) {
            $('#timeline-5').removeClass('outline');
            $('#timeline-5').addClass('solid');
          }
        }
      });
    });
  </script>
  @endauth

</body>

</html>