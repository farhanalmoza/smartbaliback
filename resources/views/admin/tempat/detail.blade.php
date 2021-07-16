@extends('layouts.template')
@section('title', 'Detail Tempat')

@section('content')
	<div class="panel-header">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Tambah Tempat</h4>
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
						<a href="#">Tambah Tempat</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-post card-round">
						<img class="card-img-top" src="{{ asset('t_admin') }}/img/blogpost.jpg" alt="Card image cap" id="thumbnail">
						<div class="card-body">
							<div class="d-flex">
								<div class="info-post ml-2">
									<h3 class="card-title" id="title">
										Best Design Resources This Week
									</h3>
									<p class="date text-muted" id="address">20 Jan 18</p>
								</div>
							</div>
							<div class="separator-solid"></div>
							<p class="card-text" id="desc">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- My Script -->
	<script>
		const slug = '{{ $slug }}'
		const id = '{{ $id }}'
	</script>
	<script src="{{ asset('t_admin/js/admin/tempat/index.js') }}"></script>
@endsection