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
							<form id="formAddPlace">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-inline">
											<label for="title" class="col-md-2 form-label justify-content-start">Nama Tempat</label>
											<div class="col-md-10 p-0">
												<input id="title" name="title" type="text" class="form-control input-full" placeholder="masukkan nama tempat">
											</div>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="gambar" class="col-md-2 form-label justify-content-start">Gambar</label>
											<div class="col-md-10 p-0">
												<input id="gambar" name="gambar" type="file" class="form-control input-full">
												<img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="avatar" class="img-fluid img-thumbnail mt-2" id="prevThumb" hidden style="max-width: 300px">
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
											<label for="koordinat" class="col-md-2 form-label justify-content-start">Kordinat Lokasi</label>
											<div class="col-md-10 p-0">
												<input id="koordinat" name="koordinat" type="text" class="form-control input-full" placeholder="masukkan kordinat lokasi">
											</div>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="desc" class="col-md-2 form-label justify-content-start">Deskripsi</label>
											<textarea class="form-control input-full col-md-10" name="desc" id="desc" rows="10" placeholder="masukkan deskripsi tempat"></textarea>
										</div>
										<div class="form-group form-inline align-items-start">
											<label for="tag" class="col-md-2 form-label justify-content-start">Tag</label>
											<div class="col-md-8 p-0">
												<div class="selectgroup selectgroup-pills" id="tags">
													
												</div>
											</div>
											<div class="col-md-2">
												<a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addTagModal">Tambah Tag</a>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary" id="addPlace">Tambah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('modal')
<div class="modal fade" id="addTagModal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="card modal-content">
			<div class="modal-header">
				<h4 class="card-title">Tambah Tag</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card-body">
				<form class="forms-sample" id="formAddTag" autocomplete="off">
					<div class="form-group form-inline align-items-start">
						<label for="nama_tag" class="col-md-2">Nama Tag</label>
						<div class="col-md-10">
							<input type="text" class="form-control input-full" id="nama_tag" name="nama_tag" placeholder="masukkan nama tag">
						</div>
					</div>
					<hr>
					<div class="d-flex justify-content-end">
						<button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm" id="addTag">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<!-- Validation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
	<!-- Sweet Alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- My Script -->
	<script src="{{ asset('t_admin/js/admin/tempat/index.js') }}"></script>
	<script src="{{ asset('t_admin/js/admin/tag/index.js') }}"></script>
@endsection