@extends('owner_car.layouts.template')
@section('title', 'Detail Mobil')

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
		.gallery a {
			text-decoration: none;
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
			animation: zoomDanFade .5s;
		}
		.overlay:target .next,
		.overlay:target .prev {
			animation: fadeAjah .5s .5s forwards;
		}

		/* navigasi */
		.prev,
		.next {
			cursor: pointer;
			position: absolute;
			top: 40%;
			width: auto;
			padding: 16px;
			margin-top: -50px;
			color: white;
			font-weight: bold;
			font-size: 20px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
			user-select: none;
			-webkit-user-select: none;
			opacity: 0;
		}

		/* Position the "next button" to the right */
		.next {
			right: 0;
			border-radius: 3px 0 0 3px;
		}

		.prev {
			left: 0;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover,
		.next:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}

		/* animasi */
		@keyframes fadeAjah {
			0% {opacity: 0;}
			100% {opacity: 1;}
		}
		@keyframes zoomDanFade {
			0% {
				transform: scale(.4);
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
				<h4 class="page-title">Detail Mobil</h4>
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
						<a href="#">Detail Mobil</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="card card-post card-round">
						<div class="card-body">
							<div class="d-flex">
								<div class="info-post ml-2">
									<h3 class="card-title" id="title"></h3>
									<p class="date text-muted" id="address"></p>
								</div>
							</div>
							<table>
								<tr>
									<th style="width: 70%; height: 30px">Nama Mobil</th>
									<td id="nama"></td>
								</tr>
								<tr>
									<th style="width: 70%; height: 30px">Nomor Polisi</th>
									<td id="nopol"></td>
								</tr>
								<tr>
									<th style="height: 30px">Status Rental</th>
									<td id="status"></td>
								</tr>
								<tr>
									<th style="height: 30px">Tahun Pembuatan</th>
									<td id="thn"></td>
								</tr>
								<tr>
									<th style="height: 30px">Harga Rental</th>
									<td id="hrgRent"></td>
								</tr>
								<tr>
									<th style="height: 30px">Harga Beli</th>
									<td id="hrgBeli"></td>
								</tr>
								<tr>
									<th style="height: 30px">Kapasitas Bahan Bakar</th>
									<td id="bbm"></td>
								</tr>
								<tr>
									<th style="height: 30px">Kapasitas Penumpang</th>
									<td id="penumpang"></td>
								</tr>
							</table>
							<p class="card-text" id="desc"></p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<div class="card-title mb-3 fw-bold">Gambar</div>
							<ul class="gallery">
								
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
	{{-- <script src="{{ asset('t_admin/js/admin/tempat/index.js') }}"></script> --}}
	<script>
		const id = '{{ $id }}'

		$(document).ready(function () {
			getDetail.loadData = id
		})

		const getDetail = {
			set loadData(data) {
				const urlDetail = URL_DATA + "/mobil/" + data
				Functions.prototype.requestDetail(getDetail, urlDetail)
			},
			set successData(response) {
				// for preview detail
				$('#nama').text(response.name)
				$('#nopol').text(response.no_car)
				$('#status').text(response.status)
				$('#thn').text(response.year_production)
				$('#hrgRent').text(response.rent_price)
				$('#hrgBeli').text(response.purchase_price)
				$('#bbm').text(response.fuel_capacity)
				$('#penumpang').text(response.passenger_capacity)

				// gallery
				var picts = response.pictures
				var pictLength = picts.length
				if (pictLength > 0) {
					var listPict = ""
					if (pictLength == 1) {
						listPict += `
						<li class="mb-2">
							<a href="#gambar-${picts[0].id}">
								<img class="card-img-top pict-thumb" src="${PICT + '/galleries/' + picts[0].picture}">
							</a>
							<div class="overlay" id="gambar-${picts[0].id}">
								<a href="#" class="close">&times;</a>

								<a href="#gambar-${picts[0].id}" class="prev">&#10094;</a>
								<img class="" src="${PICT + '/galleries/' + picts[0].picture}">
								<a href="#gambar-${picts[0].id}" class="next">&#10095;</a>
							</div>
						</li>`
					} else {
						for (let i = 0; i < pictLength; i++) {
							if (i == 0) {
								listPict += `
								<li class="mb-2">
									<a href="#gambar-${picts[i].id}">
										<img class="card-img-top pict-thumb" src="${PICT + '/galleries/' + picts[i].picture}">
									</a>
									<div class="overlay" id="gambar-${picts[i].id}">
										<a href="#" class="close">&times;</a>

										<a href="#gambar-${picts[pictLength-1].id}" class="prev">&#10094;</a>
										<img class="" src="${PICT + '/galleries/' + picts[i].picture}">
										<a href="#gambar-${picts[i+1].id}" class="next">&#10095;</a>
									</div>
								</li>`
							} else if (i+1 == pictLength) {
								listPict += `
								<li class="mb-2">
									<a href="#gambar-${picts[i].id}">
										<img class="card-img-top pict-thumb" src="${PICT + '/galleries/' + picts[i].picture}">
									</a>
									<div class="overlay" id="gambar-${picts[i].id}">
										<a href="#" class="close">&times;</a>

										<a href="#gambar-${picts[i-1].id}" class="prev">&#10094;</a>
										<img class="" src="${PICT + '/galleries/' + picts[i].picture}">
										<a href="#gambar-${picts[0].id}" class="next">&#10095;</a>
									</div>
								</li>`
							} else {
								listPict += `
								<li class="mb-2">
									<a href="#gambar-${picts[i].id}">
										<img class="card-img-top pict-thumb" src="${PICT + '/galleries/' + picts[i].picture}">
									</a>
									<div class="overlay" id="gambar-${picts[i].id}">
										<a href="#" class="close">&times;</a>

										<a href="#gambar-${picts[i-1].id}" class="prev">&#10094;</a>
										<img class="" src="${PICT + '/galleries/' + picts[i].picture}">
										<a href="#gambar-${picts[i+1].id}" class="next">&#10095;</a>
									</div>
								</li>`
							}
						}

					}
					$('.gallery').append(listPict)
				}
			},
			set errorData(err) {
				console.log(err);
			}
		}
	</script>
@endsection