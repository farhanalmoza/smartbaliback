@extends('layouts.owner.template')
@section('title', 'Daftar Mobil')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Mobil</h4>
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
                        <a href="#">Daftar Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Daftar Mobil</div>
                            <a href="{{ url('/owner/tambah-mobil') }}" class="btn btn-primary btn-sm">Tambah mobil</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table id="dataTables" class="display table table-striped table-hover" >
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
                    {{-- <div class="row" id="car-cards">
                        
                    </div> --}}
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
    <script src="{{ asset('owner/js/mobil/index.js') }}"></script>
    <script>
        $(document).ready(function () {
            getCars()
            deleteCar()
        })

        function getCars() {
            const urlCar = URL_DATA +  "/all/mobil/" + user_id
            const columns = [
                {data : 'no_car', name: 'no_car'},
                {data : 'name', name: 'name'},
                {data : 'rent_price', name: 'rent_price'},
                {data : 'passenger_capacity', name: 'passenger_capacity'},
                {data : 'fuel_capacity', name: 'fuel_capacity'},
                {data : 'actions', name: 'actions', orderable: false, searchable: false},
            ]
            Functions.prototype.tableResult("#dataTables", urlCar, columns)
        }

        function deleteCar() {
            $('#dataTables').on('click', 'tbody tr td div .delete', function(e) {
                const id = $(this).data('id')
                const urlDelete = URL_DATA + "/delete/car/" + id
                swal({
                    title: 'Apa Anda yakin?',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, hapus!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        Functions.prototype.deleteData(urlDelete);
                    } else {
                        swal.close();
                    }
                    getCars()
                });
            })
        }
    </script>
@endsection