@extends('layouts.template')
@section('title', 'Wisata')

@section('content')
    <div class="panel-header">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Wisata</h4>
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
                        <a href="#">Wisata</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <h4 class="page-title">Daftar Tempat Wisata</h4>
                <button class="btn btn-primary">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    Tempat Wisata
                </button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="{{ asset('t_admin') }}/img/blogpost.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">Kuil Bali</p>
                                <p class="date text-muted">Denpasar, Bali</p>
                            </div>
                            <div class="separator-solid"></div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            <div class="d-flex justify-content-end">
                                <a href="#">
                                    <button type="button" class="btn btn-icon btn-link btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-icon btn-link btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
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
    
@endsection