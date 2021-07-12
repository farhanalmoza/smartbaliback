@extends('layouts.template')
@section('title', 'Hotel')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Hotel</h4>
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
                        <a href="#">Hotel</a>
                    </li>
                </ul>
            </div>
            <h4 class="page-title">Daftar Hotel</h4>
            <div class="row" id="hotel-cards">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <!-- My Script -->
    <script src="{{ asset('t_admin/js/admin/hotel/index.js') }}"></script>
@endsection