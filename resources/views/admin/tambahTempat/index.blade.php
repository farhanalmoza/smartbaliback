@extends('layouts.template')
@section('title', 'Tambah Tempat')

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
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Form Tambah Tempat</div>
						</div>
						<div class="card-body">
							<form id="formTambahTempat">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-inline">
											<label for="nama-tempat" class="col-md-2 form-label justify-content-start">Nama Tempat</label>
											<div class="col-md-10 p-0">
												<input id="nama-tempat" name="nama-tempat" type="text" class="form-control input-full" placeholder="masukkan nama tempat">
											</div>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="gambar" class="col-md-2 form-label justify-content-start">Gambar</label>
											<div class="col-md-10 p-0">
												<input id="gambar" name="gambar" type="file" class="form-control input-full mb-2">
												<figure class="figure">
													<img src="{{ asset("t_admin") }}/img/producting/product1.jpeg" class="figure-img img-fluid rounded" alt="thumbnail" id="prevThumb">
												</figure>
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="tipe" class="col-md-2 form-label justify-content-start">Tipe Tempat</label>
											<div class="col-md-10 p-0">
												<select class="form-control input-full" id="tipe" name="tipe">
													<option value="tour">Tempat Wisata</option>
													<option value="hotel">Hotel</option>
													<option value="worship">Tempat Ibadah</option>
												</select>
											</div>
										</div>
										<div class="form-group form-inline">
												<label for="alamat" class="col-md-2 form-label justify-content-start">Alamat</label>
												<div class="col-md-10 p-0">
														<input id="alamat" name="alamat" type="text" class="form-control input-full" placeholder="masukkan alamat">
												</div>
										</div>
										<div class="form-group form-inline">
											<label for="kordinat" class="col-md-2 form-label justify-content-start">Kordinat Lokasi</label>
											<div class="col-md-10 p-0">
												<input id="kordinat" name="kordinat" type="text" class="form-control input-full" placeholder="masukkan kordinat lokasi">
											</div>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="deskripsi" class="col-md-2 form-label justify-content-start">Deskripsi</label>
											<textarea class="form-control input-full col-md-10" name="deskripsi" id="deskripsi" rows="10" placeholder="masukkan deskripsi tempat"></textarea>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="tag" class="col-md-2 form-label justify-content-start">Tag</label>
											<div class="col-md-8 p-0">
												<div class="selectgroup selectgroup-pills">
													<label class="selectgroup-item mb-2">
														<input type="checkbox" name="value" value="HTML" class="selectgroup-input">
														<span class="selectgroup-button">HTML</span>
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<button class="btn btn-primary btn-sm">Tambah Tag</button>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
										<button class="btn btn-primary" id="tambah">Tambah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
			
	</div>
@endsection

@section('modal')
	
@endsection

@section('js')
	<!-- My Script -->
	<script src="{{ asset('t_admin/js/admin/wisata/tambah.js') }}"></script>
@endsection