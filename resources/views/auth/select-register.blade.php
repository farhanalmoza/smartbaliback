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

  <!-- Fonts and icons -->
	<script src="{{ asset('t_admin') }}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('t_admin') }}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

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

  <style>
    #header {
      background: rgba(52, 59, 64, 0.9) !important;
    }
  </style>
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
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Register Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Register</h3>
          <p class="section-description">Silakan pilih properti yang Anda kelola</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="{{ url('/register/tour') }}"><i class="fas fa-plane"></i></a></div>
              <h4 class="title"><a href="{{ url('/register/tour') }}">Tempat Wisata</a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="{{ url('/register/hotel') }}"><i class="fas fa-hotel"></i></a></div>
              <h4 class="title"><a href="{{ url('/register/hotel') }}">Hotel</a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="{{ url('/register/car') }}"><i class="fas fa-car"></i></a></div>
              <h4 class="title"><a href="{{ url('/register/car') }}">Rental Mobil</a></h4>
            </div>
          </div>
        </div>

        <div class="row justify-content-evenly">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="{{ url('/register/souvenir') }}"><i class="fas fa-gift"></i></a></div>
              <h4 class="title"><a href="{{ url('/register/souvenir') }}">Toko Oleh-oleh</a></h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href="{{ url('/register/worship') }}"><i class="fas fa-church"></i></a></div>
              <h4 class="title"><a href="{{ url('/register/worship') }}">Tempat Ibadah</a></h4>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Register Section -->

  </main><!-- End #main -->

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