@extends('layouts.template')
@section('title', 'Daftar Pengguna')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Pengguna</h4>
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
                        <a href="#">Daftar Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Daftar Admin</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table id="dataAdmin" class="display table table-striped table-hover" >
                                <thead>
                                  <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Waktu Terdaftar</th>
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
                        <div class="card-header">
                            <div class="card-title">Daftar Owner</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table id="dataOwner" class="display table table-striped table-hover" >
                                <thead>
                                  <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Waktu Terdaftar</th>
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
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{ asset('t_admin/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- My Script -->
    <script src="{{ asset('t_admin/js/admin/pengguna/index.js') }}"></script>
    
@endsection