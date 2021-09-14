@extends('layouts.owner.template')
@section('title', 'Ganti Password')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ganti Password</h4>
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
                        <a href="#">Ganti Password</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ganti Password</div>
                        </div>
                        <div class="card-body">
                            <form id="gantiPass" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password_lama">Password Lama</label>
                                            <input type="password" class="form-control" id="password_lama" name="password_lama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_baru">Password Baru</label>
                                            <input type="password" type="text" class="form-control" id="password_baru" name="password_baru" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_konfirm">Konfirmasi Password</label>
                                            <input type="password" type="text" class="form-control" id="password_konfirm" name="password_konfirm">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
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

@section('js')
    <!-- My Script -->
    <script src="{{ asset('owner/js/settings/edit-profil.js') }}"></script>
@endsection