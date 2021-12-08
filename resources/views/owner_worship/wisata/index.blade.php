@extends('owner_tour.layouts.template')
@section('title', 'Tempat Wisata')

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
            <div class="row place" id="place-cards">
                
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
            getTours.loadData = "/wisata"
        })
    </script>
    <script src="{{ asset('js/ownerTour/wisata/index.js') }}"></script>
@endsection