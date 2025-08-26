<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Post by Kategori - Dana Siswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{!! asset('assets-blog/img/favicon.png" rel="icon') !!}">
  <link href="{!! asset('assets-blog/img/apple-touch-icon.png') !!}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{!! asset('assets-blog/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets-blog/vendor/bootstrap-icons/bootstrap-icons.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets-blog/vendor/aos/aos.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets-blog/vendor/glightbox/css/glightbox.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('assets-blog/vendor/swiper/swiper-bundle.min.css') !!}" rel="stylesheet">

   <link href="{!! asset('assets-blog/css/variables-blue.css') !!}" rel="stylesheet"> 

  <!-- Template Main CSS File -->
  <link href="{!! asset('assets-blog/css/main.css') !!}" rel="stylesheet">


    <!-- Favicons -->
    <link href="{!! asset('assets-home/img/favicon.png') !!}" rel="icon">
    <link href="{!! asset('assets-home/img/apple-touch-icon.png') !!}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{!! asset('assets-home/vendor/aos/aos.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/bootstrap-icons/bootstrap-icons.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/boxicons/css/boxicons.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/glightbox/css/glightbox.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/remixicon/remixicon.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets-home/vendor/swiper/swiper-bundle.min.css') !!}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{!! asset('assets-home/css/style.css') !!}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="/home">
        <h1><img src={{asset('images/logoo.png')}} alt="logo" class="img-fluid">&nbsp;<span>DANA SISWA</span></h1>
        </a>  
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="/home">Home</a></li>
          <li><a class="nav-link active" href="/blog">Blog</a></li>
        </ul>
        
        @auth
        <nav id="navbar" class="navbar">
            <ul>
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  @if(Auth::user()->role == "admin")
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
              <li><a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right m-2"></i><b> Login</b></a></li>
            </ul>
          </span>
        @endauth
  
      </nav><!-- .navbar -->
        <i class="bi bi-list mobile-nav-toggle"></i>
  
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Post Kategori : {{ $kategori }}</h2>
        </div>
 
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <div class="row gy-4 posts-list">
              @foreach ($posts as $post)
              <div class="col-lg-6">
                <article class="d-flex flex-column">

                  <div class="post-img">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                  </div>

                  <h2 class="title">
                    <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                  </h2>
                    <i class="bi bi-tags">
                      <a href="/kategori/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </i>

                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->user->nama }}</li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $post->created_at->diffForHumans() }}</a></li>
                    </ul>
                  </div>

                  <div class="content">
                    {{ $post->excerpt }}
                  </div>

                  <div class="read-more mt-auto align-self-end">
                    <a href="/blog/{{ $post->slug }}">Read More</a>
                  </div>

                </article>
              </div><!-- End post list item -->
                  
              @endforeach

            </div><!-- End blog posts list -->

            <div class="d-flex justify-content-center">{{$categories->links()}}</div>

          </div>
 
          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="/blog" class="mt-3">
                  <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search')}}">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  @foreach ($categories as $cat)
                  <li>⦿ <a href="/kategori/{{ $cat->slug }}">{{ $cat->name }}</a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">
                  @foreach ($postsbaru as $new)
                  <div class="post-item mt-3">
                    <img src="{{ asset('uploads/' . $new->image) }}" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="/blog/{{ $new->slug }}">{{ $new->title }}</a></h4>
                      <time>
                        <i class="bi bi-clock"></i> {{ $new->created_at->diffForHumans() }}
                      </time>
                    </div>
                  </div><!-- End recent post item-->
                  @endforeach
                </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End Blog Sidebar -->

          </div>

        </div>

      </div>
    </section><!-- End Blog Section -->

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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{!! asset('assets-blog/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! asset('assets-blog/vendor/aos/aos.js') !!}"></script>
  <script src="{!! asset('assets-blog/vendor/glightbox/js/glightbox.min.js') !!}"></script>
  <script src="{!! asset('assets-blog/vendor/isotope-layout/isotope.pkgd.min.js') !!}"></script>
  <script src="{!! asset('assets-blog/vendor/swiper/swiper-bundle.min.js') !!}"></script>
  <script src="{!! asset('assets-blog/vendor/php-email-form/validate.js') !!}"></script>

  <!-- Template Main JS File -->
  <script src="{!! asset('assets-blog/js/main.js') !!}"></script>

  
  <!-- Vendor JS Files -->
  <script src="{!! asset('assets-home/vendor/purecounter/purecounter_vanilla.js') !!}"></script>
  <script src="{!! asset('assets-home/vendor/aos/aos.js') !!}"></script>
  <script src="{!! asset('assets-home/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! asset('assets-home/vendor/glightbox/js/glightbox.min.js') !!}"></script>
  <script src="{!! asset('assets-home/vendor/swiper/swiper-bundle.min.js') !!}"></script>
  <script src="{!! asset('assets-home/vendor/php-email-form/validate.js') !!}"></script>

  <!-- Template Main JS File -->
  <script src="{!! asset('assets-home/js/main.js') !!}"></script>

</body>

</html>