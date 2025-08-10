<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dana Siswa</title>

  <!-- Favicons -->
  <link href="images/logoo.png" rel="icon">
  <link href="assets-home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-home/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets-home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-home/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets-home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets-home/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="/">
        <h1><img src={{asset('images/logoo.png')}} alt="logo" class="img-fluid">&nbsp;<span>DANA SISWA</span></h1>
        </a>  
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#features">Fitur - Fitur</a></li>
          <li><a class="nav-link" href="/blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          &nbsp;&nbsp;
        </ul>
        
        @auth
        <nav id="navbar" class="navbar">
            <ul>
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  @if(Auth::user()->role == "admin" || Auth::user()->role == "SuperAdmin")
                  <li><a href="/admin">My Dashboard</a></li>

                  @else
                  <li><a href="/user">My Dashboard</a></li>
                  @endif  
                  
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
          </ul> 
        </nav>

        @else
          <span class="navbar-text">
            <ul class="navbar-nav">
              <li><a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right m-2"></i><b>Login</b></a></li>
            </ul>
          </span>
        @endauth

      </nav><!-- .navbar -->
        <i class="bi bi-list mobile-nav-toggle"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          @auth
            <div data-aos="zoom-out">
              <h1>Selamat Datang <br> di Dana Siswa!<br>
                <span>Hai, {{Auth::user()->nama}}</span></h1>
              <div class="text-center text-lg-start">
                <a href="#about" class="btn-get-started scrollto">Mulai Jelajahi Web</a>
              </div>
            </div>
          @else
          <div data-aos="zoom-out">
            <h1>Selamat Datang <br>di Dana Siswa!</h1>
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto">Mulai Jelajahi Web</a>
            </div>
          </div>
        @endauth
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets-home/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center align-items-stretch">
            <img src="images/lock.jpg" alt="lock" style="height: 570px">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Tentang Dana Siswa</h3>
            <p>Dana Siswa merupakan sebuah aplikasi berbasis website yang dibuat untuk memudahkan para murid dalam 
              menyimpan ataupun mengelola uang mereka. Lalu, Mengapa harus memilih dana siswa?
            </p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title" style="padding-top: 20px">Keamanan Terpercaya</h4>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title" style="padding-top: 20px">Mudah Digunakan</h4>
              </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title" style="padding-top: 20px">Fitur yang Membantu</h4>
              </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Fitur - Fitur</h2>
          <p>Cek Fiturnya!</p>
        </div>

        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3>Deposito</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3>Penarikan</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3>Riwayat Transaksi</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3>Ganti Password</h3>
            </div>
          </div>
        </div>

        <div class="row mt-3" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3>Saerching</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3>Pagination</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3>Filter Tanggal</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3>Berita & F.A.Q</h3>
            </div>
          </div>
        </div>

        <div class="row mt-3 justify-content-md-center" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3>Authentication User</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3>Multi Level Admin</h3>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Features Section -->
    
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container horizontal-scrollable">

        <div class="section-title" data-aos="fade-up">
          <h2>Team 6</h2>
          <p>Our Great Team</p>
        </div>

        <div class="row text-center" data-aos="fade-left">

          <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="images/fahru.jpg" class="img-fluid" alt="" ></div>
              <div class="member-info">
                <h4>Muhammad Fahru Rozi</h4>
                <span>211402029</span>
                <div class="social">
                  <a href="https://www.instagram.com/m.fahru_i7/"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/fahru-rozi-582372180"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mt-5 mt-md-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="images/nopal.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>M. Naufal Hamdy</h4>
                <span>211402056</span>
                <div class="social">
                  <a href="https://www.instagram.com/naufalhamdy_17/"><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="images/hakim.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Abdul Hakim Zelfi</h4>
                <span>211402086</span>
                <div class="social">
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="images/hatta.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Muhammad Hatta Abdillah</h4>
                <span>211402110</span>
                <div class="social">
                  <a href="https://instagram.com/mhmhatta?igshid=YmMyMTA2M2Y="><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/hatta-abdillah-818b53217"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="images/putra.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Syah Putra</h4>
                <span>211402125</span>
                <div class="social">
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
 
          <div class="col-lg-2 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="images/filza.jpg " class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Filza Rizki Ramadhan</h4>
                <span>211402146</span>
                <div class="social">
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->
   
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            @foreach ($faqs as $faq)
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-{{ $faq->id }}">{{ $faq->question }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{ $faq->id }}" class="collapse" data-bs-parent=".faq-list">
                {!! $faq->answer !!}
              </div>
            </li>
            @endforeach


          </ul>
        </div>
      </div>
    </section><!-- End F.A.Q Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col ">
            <div class="footer-info">
              <h3>Dana Siswa</h3>
              <p class="pb-3"><em>"Jangan menabung apa yang tersisa, tapi habiskan apa yang tersisa setelah menabungnya." <br> – Warrant Buffet.</em></p>
              <p>
                Kelompok 6 - KOM B <br>
                Pemrogramman Web Lanjutan<br><br>
                <strong>We are from:</strong><br>
                Teknologi Informasi 2021 <br>
                Fasilkom-TI<br>
                𝚄𝙽𝙸𝚅𝙴𝚁𝚂𝙸𝚃𝙰𝚂 𝚂𝚄𝙼𝙰𝚃𝙴𝚁𝙰 𝚄𝚃𝙰𝚁𝙰<br>
              </p>
              <div class="social-links mt-3">
                <a href="ttps://instagram.com/mhmhatta?igshid=YmMyMTA2M2Y=" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2022. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets-home/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets-home/vendor/aos/aos.js"></script>
  <script src="assets-home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-home/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets-home/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets-home/js/main.js"></script>

</body>

</html>