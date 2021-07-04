@extends('layouts.template')
@section('title', 'Wisata')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Wisata</h4>
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
                        <a href="#">Wisata</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <h4 class="page-title">Daftar Tempat Wisata</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addWisataModal">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    Tempat Wisata
                </button>
            </div>
            <div class="row" id="tour-cards">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('modal')
  <!-- Modal -->
  <div class="modal fade" id="addWisataModal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
			<div class="card modal-content">
				<div class="modal-header">
					<h4 class="card-title">Tambah Tempat Wisata</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body">
					<form class="forms-sample" id="formAddEducation" autocomplete="off">
						<div class="form-group form-inline">
							<label for="nama-tempat" class="col-md-2 col-form-label">Nama Tempat</label>
							<input type="text" class="form-control col-md-10" id="nama-tempat" name="nama-tempat" placeholder="Masukkan nama tempat">
						</div>
						<div class="form-group form-inline">
							<label for="alamat" class="col-md-2 col-form-label">Alamat</label>
							<input type="text" class="form-control col-md-10" id="alamat" name="alamat" placeholder="Masukkan alamat">
						</div>
						<div class="form-group form-inline align-items-start">
							<label for="deskripsi" class="col-md-2 col-form-label">Deskripsi</label>
							<textarea type="text" class="form-control col-md-10" id="deskripsi" name="deskripsi" rows="5"></textarea>
						</div>
						<div class="d-flex justify-content-end mt-2">
							<button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary" id="add">Tambah</button>
						</div>
					</form>
				</div>
			</div>
    </div>
  </div>

  {{-- modal update --}}
  
@endsection

@section('js')
    <!-- My Script -->
    <script src="{{ asset('t_admin/js/admin/place/index.js') }}"></script>
@endsection