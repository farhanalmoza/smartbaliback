<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') | Pengelola Tempat Wisata</title>
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

	<!-- Main styles for this application-->
    <link href="{{ asset('t_admin/css/style.css') }}" rel="stylesheet">

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/demo.css">

	<!-- My CSS -->
	@yield('css')
</head>
<body data-background-color="bg3">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-primary">
				
				<a href="index.html" class="logo">
					<img src="{{ asset('t_admin') }}/img/logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('owner_car.components.topbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		@include('owner_car.components.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
			@yield('modal')
			@include('components.footer')
		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('t_admin') }}/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/core/popper.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('t_admin') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('t_admin') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Validation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
	<!-- Sweet Alert -->
	<script src="{{ asset('t_admin') }}/js/plugin/sweetalert/sweetalert.min.js"></script>
	<!-- Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('t_admin') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('t_admin') }}/js/atlantis.min.js"></script>
	<!-- Bootstrap Notify -->
	<script src="{{ asset('t_admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- My script -->
  	<script src="{{asset('t_admin/js/functions.js')}}"></script>
  	<script src="{{asset('js/ownerTour/notify/index.js')}}"></script>
  	
	<script>
		const URL_DATA = '{{ url('data') }}'
		const ASSET = '{{ asset("t_admin") }}'
        const email = '{{ auth()->user()->email }}'
        const user_id = '{{ auth()->user()->id }}'
		const PICT = '{{ asset("storage/pictures/") }}'
		const BASE_URL = '{{ url("/") }}'

		$(document).ready(function () {
			getPict.loadData = email
		})

		const getPict = {
			set loadData(data) {
				const URL = URL_DATA + "/pengaturan/owner-car/" + data
				Functions.prototype.requestDetail(getPict, URL)
			},
			set successData(response) {
				response.picture ? $('#ava-side').attr('src', PICT + '/profile/' + response.picture) : $('#ava-side').attr('src', 'https://demo.getstisla.com/assets/img/avatar/avatar-1.png')
				response.picture ? $('.ava-top').attr('src', PICT + '/profile/' + response.picture) : $('.ava-top').attr('src', 'https://demo.getstisla.com/assets/img/avatar/avatar-1.png')

				// template
				$('#name-sidebar').text(response.name).append('<span class="user-level">Pengelola Mobil</span>')
				$('#name-topbar').text(response.name)
				$('#email-topbar').text(response.email)
			},
			set errorData(err) {
				var content = {};
				content.title = 'Error';
				content.message = err.responseJSON.message;
				content.icon = 'fa fa-times';
				$.notify(content,{
					type: 'danger',
					placement: {
						from: 'top',
						align: 'right'
					},
					time: 1000,
					delay: 10000,
				})
			}
		}
	</script>
	@yield('js')
</body>
</html>