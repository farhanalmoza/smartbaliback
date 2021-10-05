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
                    </div>
                    <div class="row" id="car-cards">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <script src="{{ asset('owner/js/mobil/index.js') }}"></script>
@endsection