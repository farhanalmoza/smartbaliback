@extends('owner_souvenir.layouts.template')
@section('title', 'Wisata')

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
                <h4 class="page-title">Oleh-oleh</h4>
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
                        <a href="#">Oleh-oleh</a>
                    </li>
                </ul>
            </div>
            <h4 class="page-title">Daftar Tempat Oleh-oleh</h4>
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
            getSouvenirs.loadData = "/souvenir"
            getTags.loadData = "/tag"
        })        

        function getDataPlaceByTag(id) {
            // toggle class tag button
            $('#btn-tag button').addClass('btn-border')
            event.srcElement.classList.remove('btn-border')
            // buat objek ajax
            var xhr = new XMLHttpRequest();
            // eksekusi ajax
            xhr.open('GET', getPlaceByTag.loadData = "/souvenir-tag/" + id, true)
        }

        // get all place when click all in tag button
        function allPlace() {
            $('#btn-tag button').addClass('btn-border')
            event.srcElement.classList.remove('btn-border')
            getSouvenirs.loadData = "/souvenir"
        }
    </script>
    <script src="{{ asset('js/ownerSouvenir/souvenir/index.js') }}"></script>
@endsection