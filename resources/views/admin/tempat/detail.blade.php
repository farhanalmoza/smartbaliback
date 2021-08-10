@extends('layouts.template')
@section('title', 'Detail Tempat')

@section('css')
	<style>
		ul {
			list-style: none;
		}
		ul {
			padding: 0;
		}
		.pict-thumb {
			transition: 0.3s;
		}
		.pict-thumb:hover {opacity: 0.7;}
		.gallery li img {
			border-radius: 4px !important;
		}

		/* overlay */
		.overlay {
			width: 0;
			height: 0;
			overflow: hidden;
			position: fixed;
			top: 0;
			left: 0;
			background-color: rgba(0, 0, 0, 0);
			z-index: 9999;
			transition: .4s;
			text-align: center;
			padding: 20px 0 0 0;
		}
		.overlay:target {
			width: auto;
			height: auto;
			bottom: 0;
			right: 0;
			background-color: rgba(0, 0, 0, .8);
		}
		.overlay img {
			max-height: 100%;
			box-shadow: 2px 2px 7px rgba(0, 0, 0, .8);
		}
		.overlay:target img {
			animation: zoomDanFade 1s;
		}

		/* animasi */
		@keyframes zoomDanFade {
			0% {
				transform: scale(0);
				opacity: 0;
			}
			100% {
				transform: scale(1);
				opacity: 1;
			}
		}

		/* The Close Button */
		.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #ffffff !important;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}

		.close:hover,
		.close:focus {
			color: #bbb !important;
			text-decoration: none;
			cursor: pointer;
		}	
	</style>
@endsection

@section('content')
	<div class="panel-header">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Tambah Tempat</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Tambah Tempat</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="card card-post card-round">
						<img class="card-img-top" src="{{ asset('t_admin') }}/img/blogpost.jpg" alt="Card image cap" id="thumbnail">
						<div class="card-body">
							<div class="d-flex">
								<div class="info-post ml-2">
									<h3 class="card-title" id="title">
										Best Design Resources This Week
									</h3>
									<p class="date text-muted" id="address">20 Jan 18</p>
								</div>
							</div>
							<div class="separator-solid"></div>
							<p class="card-text" id="desc">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<div class="card-title mb-3 fw-bold">Gambar</div>
							<ul class="gallery">
								<li class="mb-2">
									<a href="#gambar-1">
										<img class="card-img-top pict-thumb" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</a>
									<div class="overlay" id="gambar-1">
										<a href="#" class="close">&times;</a>
										<img class="" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</div>
								</li>
								<li class="mb-2">
									<a href="#gambar-2">
										<img class="card-img-top pict-thumb" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</a>
									<div class="overlay" id="gambar-2">
										<a href="#" class="close">&times;</a>
										<img class="" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</div>
								</li>
								<li class="mb-2">
									<a href="#gambar-3">
										<img class="card-img-top pict-thumb" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</a>
									<div class="overlay" id="gambar-3">
										<a href="#" class="close">&times;</a>
										<img class="" src="{{ asset('t_admin') }}/img/blogpost.jpg">
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- My Script -->
	<script>
		const slug = '{{ $slug }}'
		const id = '{{ $id }}'
	</script>
	<script src="{{ asset('t_admin/js/admin/tempat/index.js') }}"></script>
@endsection