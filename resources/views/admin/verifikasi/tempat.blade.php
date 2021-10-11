@extends('layouts.template')
@section('title', 'Verifikasi Tempat')

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
                <h4 class="page-title">Verifikasi Tempat</h4>
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
                        <a href="#">Verifikasi Tempat</a>
                    </li>
                </ul>
            </div>
            <h4 class="page-title">Data tempat yang belum terverifikasi</h4>
            
            <div class="row place" id="place-cards">
                
            </div>

            <h4 class="page-title">Data tempat yang tidak lolos verifikasi</h4>
            
            <div class="row" id="unverified-places">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        
    </div>
@endsection

@section('js')
    <!-- My Script -->
    <script>
        $(document).ready(function() {
            getVerifyPlaces.loadData = "/verify-places"
            getUnverifiedPlaces.loadData = "/unverified-places"
        })
    </script>
    <script src="{{ asset('t_admin/js/admin/verifikasi/tempat.js') }}"></script>
@endsection