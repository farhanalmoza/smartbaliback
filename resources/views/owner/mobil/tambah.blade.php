@extends('layouts.owner.template')
@section('title', 'Tambah Mobil')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Mobil</h4>
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
                        <a href="{{ url('owner/mobil') }}">Daftar Mobil</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Tambah Mobil</div>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Batal</a>
                        </div>
                        <div class="card-body">
                            <form id="formAddCar">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-inline">
											<label for="nopol" class="col-md-2 form-label justify-content-start">Nomor Polisi</label>
											<div class="col-md-10 p-0">
												<input id="nopol" name="nopol" type="text" class="form-control input-full" placeholder="masukkan nomor polisi">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="namaMobil" class="col-md-2 form-label justify-content-start">Nama Mobil</label>
											<div class="col-md-10 p-0">
												<input id="namaMobil" name="namaMobil" type="text" class="form-control input-full" placeholder="masukkan nama mobil">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="tahun" class="col-md-2 form-label justify-content-start">Tahun Produksi</label>
											<div class="col-md-10 p-0">
												<input id="tahun" name="tahun" type="text" class="form-control input-full" placeholder="masukkan tahun produksi">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="hargaRent" class="col-md-2 form-label justify-content-start">Harga Sewa</label>
											<div class="col-md-10 p-0">
												<input id="hargaRent" name="hargaRent" type="text" class="form-control input-full" placeholder="masukkan harga sewa">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="hargaBeli" class="col-md-2 form-label justify-content-start">Harga Beli</label>
											<div class="col-md-10 p-0">
												<input id="hargaBeli" name="hargaBeli" type="text" class="form-control input-full" placeholder="masukkan harga beli">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="bbm" class="col-md-2 form-label justify-content-start">Kapasitas BBM</label>
											<div class="col-md-10 p-0">
												<input id="bbm" name="bbm" type="text" class="form-control input-full" placeholder="masukkan kapasitas bbm">
											</div>
										</div>
										<div class="form-group form-inline">
											<label for="penumpang" class="col-md-2 form-label justify-content-start">Kapasitas Penumpang</label>
											<div class="col-md-10 p-0">
												<input id="penumpang" name="penumpang" type="text" class="form-control input-full" placeholder="masukkan kapasitas penumpang">
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary" id="addCar">Tambah</button>
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
<script src="{{ asset('owner/js/mobil/index.js') }}"></script>
@endsection