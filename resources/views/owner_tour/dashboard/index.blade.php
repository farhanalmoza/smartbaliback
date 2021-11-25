@extends('owner_tour.layouts.template')
@section('title', 'Dashboard')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">dashboard</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-plane text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="tours">
                                    <h4 class="card-title" id="total-tours"></h4>
                                    <p class="card-category">Tempat Wisata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/ownerTour/dashboard/index.js') }}"></script>
@endsection