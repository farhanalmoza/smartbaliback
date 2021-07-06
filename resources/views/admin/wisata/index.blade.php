@extends('layouts.template')
@section('title', 'Wisata')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Wisata</h4>
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
                        <a href="#">Wisata</a>
                    </li>
                </ul>
            </div>
            <h4 class="page-title">Daftar Wisata</h4>
            <div class="row" id="tour-cards">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <!-- My Script -->
    <script src="{{ asset('t_admin/js/admin/place/index.js') }}"></script>
@endsection