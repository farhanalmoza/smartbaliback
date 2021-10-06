@extends('layouts.owner.template')
@section('title', 'Tambah Gambar Mobil')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Gambar Mobil</h4>
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
                        <a href="#">Tambah Gambar Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Tambah Gambar Mobil</div>
                        </div>
                        <div class="card-body">
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
							<div class="d-flex justify-content-end">
								<a href="{{ url('/owner/mobil') }}" class="btn btn-primary btn-sm">Selesai</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
	<script>
		const id = '{{ $id }}'
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('owner/js/mobil/index.js') }}"></script>
	<script src="{{ asset('owner/js/mobil/image.js') }}"></script>
@endsection