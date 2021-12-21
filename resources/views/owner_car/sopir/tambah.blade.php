@extends('owner_car.layouts.template')
@section('title', 'Tambah Sopir')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Sopir</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('owner/dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('owner/sopir') }}">Daftar Sopir</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Sopir</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Tambah Sopir</div>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                        <div class="card-body">
                            <form id="formAddDriver">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-inline">
											<label for="nama" class="col-md-2 form-label justify-content-start">Nama Sopir</label>
											<div class="col-md-10 p-0">
												<input id="nama" name="nama" type="text" class="form-control input-full" placeholder="masukkan nama sopir">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="alamat" class="col-md-2 form-label justify-content-start">Alamat</label>
											<div class="col-md-10 p-0">
												<textarea class="form-control input-full" id="alamat" name="alamat" placeholder="masukkan alamat"></textarea>
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="noHp" class="col-md-2 form-label justify-content-start">Nomor Telepon</label>
											<div class="col-md-10 p-0">
												<input id="noHp" name="noHp" type="text" class="form-control input-full" placeholder="masukkan nomor telepon">
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary" id="addDriver">Tambah</button>
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
	<script src="{{ asset('js/ownerCar/sopir/index.js') }}"></script>
@endsection