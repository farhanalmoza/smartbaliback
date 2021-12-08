@extends('owner_hotel.layouts.template')
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <p class="demo mb-2" id="btn-tag">
                                <button class="btn btn-primary btn-round btn-sm ml-2" onclick="allPlace()">All</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
            getHotels.loadData = "/hotel"
        })
    </script>
    <script src="{{ asset('js/ownerHotel/hotel/index.js') }}"></script>
@endsection