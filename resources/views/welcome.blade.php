@extends('layouts.beranda')

@section('hero')
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('mamba/assets/img/mbky2.jpeg'); background-position: center bottom; background-size: cover;">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">PPDB Online SMKN 1 Al-Mubarkeya</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('mamba/assets/img/mbky1.jpeg'); background-position: center bottom; background-size: cover;">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">PPDB Online SMKN 1 Al-Mubarkeya</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('mamba/assets/img/mbky3.jpeg'); background-position: center center; background-size: cover;">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">PPDB Online SMKN 1 Al-Mubarkeya</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row no-gutters">
        <div class="col-lg-6 video-box">
          <img src="{{ url('mamba/assets/img/mbky-about.jpeg') }}" class="img-fluid" alt="">
          {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
        </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

          <div class="section-title">
            <h2>Tentang Kami</h2>
            <p>SMK Negeri 1 Al-Mubarkeya Ingin Jaya merupakan Lembaga Pendidikan Menengah Kejuruan di Aceh Besar yang dibangun oleh Pemerintah Kuwait. Pembangunan awal fisik SMK Negeri 1 Al-Mubarkeya Ingin Jaya dimulai sejak tahun 2010 di atas tanah seluas 8.961 m2 . Pembangunan gedung ini semula diperuntukkan untuk sekolah terpadu (SD, SMP dan SMA). Pada tahun 2013 dialihfungsikan menjadi Kantor Dinas Pendidikan Aceh Besar sebelum menjadi SMK. Berdasarkan SK Bupati Aceh Besar Nomor 254 Tahun 2014 disahkan menjadi SMK Negeri 1 Al-Mubarkeya Ingin Jaya yang diresmikan oleh Bupati Aceh Besar pada tanggal 2 Januari 2014 beralamat di Desa Kayee Lee, Kecamatan Ingin Jaya, Kabupaten Aceh Besar.</p>
          </div>

          <div class="row">
            <div class="col-4 mb-1">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="javascript:void(0)">CERDAS</a></h4>
            </div>
            </div>
  
            <div class="col-4 mb-1">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="javascript:void(0)">TERAMPIL</a></h4>
            </div>
            </div>
            
            <div class="col-4 mb-1">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="javascript:void(0)">ISLAMI</a></h4>
            </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <section class="about-lists">
    <div class="container">

      <div class="section-title">
        <h2>Visi dan Misi Sekolah</h2>
        <p class="" style="font-style: italic">"Mewujudkan Generasi SMK Unggul, terampil, berbudaya yang berkarakter edutechnopreuneur islami serta menjunjung tinggi nilai Pancasila dalam menghadapi Era Digital"</p>
      </div>

      <div class="row no-gutters">

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
          <span>01</span>
          <h4>Lorem Ipsum</h4>
          <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
          <span>02</span>
          <h4>Repellat Nihil</h4>
          <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
          <span>03</span>
          <h4> Ad ad velit qui</h4>
          <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
          <span>04</span>
          <h4>Repellendus molestiae</h4>
          <p>Inventore quo sint a sint rerum. Distinctio blanditiis deserunt quod soluta quod nam mider lando casa</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
          <span>05</span>
          <h4>Sapiente Magnam</h4>
          <p>Vitae dolorem in deleniti ipsum omnis tempore voluptatem. Qui possimus est repellendus est quibusdam</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
          <span>06</span>
          <h4>Facilis Impedit</h4>
          <p>Quis eum numquam veniam ea voluptatibus voluptas. Excepturi aut nostrum repudiandae voluptatibus corporis sequi</p>
        </div>

      </div>

    </div>
  </section><!-- End About Lists Section -->
@endsection