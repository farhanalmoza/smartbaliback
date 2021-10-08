@extends('layouts.owner.template')
@section('title', 'Edit Data Mobil')

@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2.min.css">
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2-bootstrap4.min.css">
@endsection

@section('content')
	<div class="panel-header">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Data Mobil</h4>
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
						<a href="#">Edit Data Mobil</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<div class="card-title">Form Edit Mobil</div>
							<a href="{{ url()->previous() }}" class="btn btn-danger btn-sm" id="kembali">Kembali</a>
						</div>
						<div class="card-body">
							<div class="nav-tabs-boxed">
								<ul class="nav nav-tabs" role="tablist">
								  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Data</a></li>
								  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images" role="tab" aria-controls="profile">Gambar</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="home" role="tabpanel">
										<form id="formEditCar">
											<input type="hidden" name="id" id="id">
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-inline">
														<label for="nopol" class="col-md-2 form-label justify-content-start">Nomor Polisi</label>
														<div class="col-md-10 p-0">
															<input id="nopol" name="nopol" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="namaMobil" class="col-md-2 form-label justify-content-start">Nama Mobil</label>
														<div class="col-md-10 p-0">
															<input id="namaMobil" name="namaMobil" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="tahun" class="col-md-2 form-label justify-content-start">Tahun Produksi</label>
														<div class="col-md-10 p-0">
															<input id="tahun" name="tahun" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="hargaRent" class="col-md-2 form-label justify-content-start">Harga Sewa</label>
														<div class="col-md-10 p-0">
															<input id="hargaRent" name="hargaRent" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="hargaBeli" class="col-md-2 form-label justify-content-start">Harga Beli</label>
														<div class="col-md-10 p-0">
															<input id="hargaBeli" name="hargaBeli" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="bbm" class="col-md-2 form-label justify-content-start">Kapasitas BBM</label>
														<div class="col-md-10 p-0">
															<input id="bbm" name="bbm" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="penumpang" class="col-md-2 form-label justify-content-start">Kapasitas Penumpang</label>
														<div class="col-md-10 p-0">
															<input id="penumpang" name="penumpang" type="text" class="form-control input-full">
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="d-flex justify-content-end">
												<button type="submit" class="btn btn-primary" id="editCar">Ubah</button>
											</div>
										</form>
									</div>
									<div class="tab-pane" id="images" role="tabpanel">
										<div class="row" id="fieldImage">
											<div class="col-md-3 col-sm-4 col-6 mb-2" id="fieldUpload">
												<form id="uploadFile" enctype="multipart/form-data">
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="custom-file">
																<input type="file" name="files" class="update-file" id="updateFile" aria-describedby="inputGroupFileAddon01">
																<label class="custom-file-label" for="updateFile">Choose file</label>
															</div>
														</div>
													</div>
													<div class="progress" style="display: none">
														<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
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
				const urlDetail = URL_DATA + "/mobil/" + data
				Functions.prototype.requestDetail(getDetailForUpdate, urlDetail)
			},
			set successData(response) {
				$('#id').val(response.id)
				$('#nopol').val(response.no_car)
				$('#namaMobil').val(response.name)
				$('#tahun').val(response.year_production)
				$('#hargaRent').val(response.rent_price)
				$('#hargaBeli').val(response.purchase_price)
				$('#bbm').val(response.fuel_capacity)
				$('#penumpang').val(response.passenger_capacity)

				// pictures form gallery
				var picts = response.pictures
				if(picts.length > 0) {
					var listImage = ""
					picts.map(picture => {
						listImage += `
							<div class="col-md-3 col-sm-4 col-6 mb-2">
								<img src="${PICT + '/galleries/' + picture.picture}" alt="${PICT + '/galleries/' + picture.picture}" class="img-responsive img-fluid img-thumbnail">
								<button class="btn btn-sm btn-danger delImage" data-image-id="${picture.id}">
									<i class="fas fa-times"></i>
								</button>
							</div>`
					})
					$('#fieldUpload').before(listImage)
				}
			},
			set errorData(err) {
				console.log(err);
			}
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('owner/js/mobil/index.js') }}"></script>
	<script src="{{ asset('owner/js/mobil/image.js') }}"></script>
@endsection