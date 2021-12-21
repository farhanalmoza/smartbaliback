@extends('owner_car.layouts.template')
@section('title', 'Edit Data Sopir')

@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2.min.css">
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2-bootstrap4.min.css">
@endsection

@section('content')
	<div class="panel-header">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Data Sopir</h4>
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
						<a href="#">Edit Data Sopir</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<div class="card-title">Form Edit Sopir</div>
							<a href="{{ url()->previous() }}" class="btn btn-danger btn-sm" id="kembali">Kembali</a>
						</div>
						<div class="card-body">
							<form id="formEditDriver">
								<input type="hidden" name="id" id="id">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-inline">
											<label for="nama" class="col-md-2 form-label justify-content-start">Nama Sopir</label>
											<div class="col-md-10 p-0">
												<input id="nama" name="nama" type="text" class="form-control input-full" >
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="alamat" class="col-md-2 form-label justify-content-start">Alamat</label>
											<div class="col-md-10 p-0">
												<textarea class="form-control input-full" id="alamat" name="alamat"></textarea>
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="noHp" class="col-md-2 form-label justify-content-start">Nomor Telepon</label>
											<div class="col-md-10 p-0">
												<input id="noHp" name="noHp" type="text" class="form-control input-full" >
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary" id="editDriver">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	{{-- Tiny MCE 5 --}}
	<script src="{{ asset('t_admin') }}/js/tinymce/jquery.tinymce.min.js" referrerpolicy="origin"></script>
	<script src="{{ asset('t_admin') }}/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
	<!-- My Script -->
	<script>
		const id = '{{ $id }}'
		$(document).ready(function() {
			getDetailForUpdate.loadData = id
		})

		// detail for update
		const getDetailForUpdate = {
			set loadData(data) {
				const urlDetail = URL_DATA + "/driver/" + data
				Functions.prototype.requestDetail(getDetailForUpdate, urlDetail)
			},
			set successData(response) {
				$('#id').val(response.id)
				$('#nama').val(response.name)
				$('#alamat').text(response.address)
				$('#noHp').val(response.phone)

				// pictures form gallery
				// var picts = response.pictures
				// if(picts.length > 0) {
				// 	var listImage = ""
				// 	picts.map(picture => {
				// 		listImage += `
				// 			<div class="col-md-3 col-sm-4 col-6 mb-2">
				// 				<img src="${PICT + '/galleries/' + picture.picture}" alt="${PICT + '/galleries/' + picture.picture}" class="img-responsive img-fluid img-thumbnail">
				// 				<button class="btn btn-sm btn-danger delImage" data-image-id="${picture.id}">
				// 					<i class="fas fa-times"></i>
				// 				</button>
				// 			</div>`
				// 	})
				// 	$('#fieldUpload').before(listImage)
				// }
			},
			set errorData(err) {
				console.log(err);
			}
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('js/ownerCar/sopir/index.js') }}"></script>
	<script src="{{ asset('js/ownerCar/sopir/image.js') }}"></script>
@endsection