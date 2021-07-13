<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title') | Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('t_admin') }}/img/icon.ico" type="image/x-icon"/>

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

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/atlantis.min.css">
  <!-- My CSS -->
  <style>
    body {
      background-image: url("{{ asset('t_admin/img/auth-bg.jpg') }}") !important;
      background-size: cover !important;
      background-repeat: no-repeat !important;
      background-position-y: bottom !important; 
    }
  </style>

</head>
<body data-background-color="dark">
	<div class="wrapper overlay-sidebar">

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
            
						@yield('content')
            
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('t_admin') }}/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/core/popper.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('t_admin') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('t_admin') }}/js/atlantis.min.js"></script>
</body>
</html>