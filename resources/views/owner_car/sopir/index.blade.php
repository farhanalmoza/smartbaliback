@extends('owner_car.layouts.template')
@section('title', 'Daftar Sopir')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Sopir</h4>
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
                        <a href="#">Daftar Sopir</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Daftar Sopir</div>
                            <a href="{{ url('/owner-car/tambah-sopir') }}" class="btn btn-primary btn-sm">Tambah sopir</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
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
    {{-- My Script --}}
    <script>
        $(document).ready(function() {
            getDrivers()
        })

        function getDrivers() {
            const urlDriver = URL_DATA +  "/all/driver/" + user_id
            const columns = [
                {data : 'name', name: 'name'},
                {data : 'address', name: 'address'},
                {data : 'phone', name: 'phone'},
                {data : 'actions', name: 'actions', orderable: false, searchable: false},
            ]
            Functions.prototype.tableResult("#dataTables", urlDriver, columns)
        }
    </script>
    <script src="{{ asset('/js/ownerCar/sopir/index.js') }}"></script>
@endsection