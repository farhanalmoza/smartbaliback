@extends('layouts.template')
@section('title', 'Verifikasi Mobil')

@section('css')
    <style>
        #btn-tag {
            overflow-x: auto;
            white-space: nowrap;
        }
        #btn-tag::-webkit-scrollbar {
            display: none;
        }
        #btn-tag > btn {
            display: inline-block;
            float: none;
        }
    </style>
@endsection

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Verifikasi Mobil</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Verifikasi Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Daftar mobil yang belum terverifikasi</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table id="notVerify" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>Nomor Polisi</th>
                            <th>Nama Mobil</th>
                            <th>Harga Rental</th>
                            <th>Kapasitas Penumpang</th>
                            <th>Kapasitas BBM</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Daftar mobil yang tidak lolos terverifikasi</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table id="unverified" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>Nomor Polisi</th>
                            <th>Nama Mobil</th>
                            <th>Harga Rental</th>
                            <th>Kapasitas Penumpang</th>
                            <th>Kapasitas BBM</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{ asset('t_admin/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- My Script -->
    <script>
        
    </script>
    <script src="{{ asset('t_admin/js/admin/mobil/index.js') }}"></script>
    <script src="{{ asset('t_admin/js/admin/verifikasi/mobil.js') }}"></script>
@endsection