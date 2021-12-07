<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Bali Backpacker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('t_admin') }}/img/icon.ico" rel="icon">
  <link href="{{ asset('t_admin') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('t_admin') }}/l_page/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('t_admin') }}/l_page/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('t_admin') }}/l_page/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('t_admin') }}/l_page/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('t_admin') }}/l_page/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('t_admin') }}/l_page/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('t_admin') }}/css/l_page.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        {{-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> --}}
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="{{ url('/') }}">S-BABAC</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            @if (Route::has('login'))
                @auth
                    <li><a class="nav-link scrollto" href="{{ url('/owner-tour/dashboard') }}">Home</a></li>
                @else
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                        <li><a class="nav-link scrollto" href="{{ route('register.select') }}">Register</a></li>
                    @endif
                @endauth
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to S-babac</h1>
      <h2>Smart Bali Backpacker</h2>
      @if (Route::has('login'))
        @auth
        @else
          <a href="{{ route('login') }}" class="btn-get-started">Login</a>  
        @endauth
      @endif
    </div>
  </section><!-- End Hero Section -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('t_admin') }}/l_page/aos/aos.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/php-email-form/validate.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/purecounter/purecounter.js"></script>
  <script src="{{ asset('t_admin') }}/l_page/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('t_admin') }}/js/l_page.js"></script>

</body>

</html>
