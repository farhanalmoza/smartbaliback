@extends('layouts.template')
@section('title', 'Edit Tempat')

@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2.min.css">
	<link rel="stylesheet" href="{{ asset('t_admin') }}/css/select2-bootstrap4.min.css">
@endsection

@section('content')
	<div class="panel-header">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Edit Tempat</h4>
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
						<a href="#">Edit Tempat</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<div class="card-title">Form Edit Tempat</div>
							<a href="{{ url()->previous() }}" class="btn btn-danger btn-sm" id="kembali">Kembali</a>
						</div>
						<div class="card-body">
							<div class="nav-tabs-boxed">
								<ul class="nav nav-tabs" role="tablist">
								  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Data</a></li>
								  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images" role="tab" aria-controls="profile">Gambar</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="home" role="tabpanel">
										<form id="formEditPlace">
											<input type="hidden" name="id" id="id">
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-inline">
														<label for="title" class="col-md-2 form-label justify-content-start">Nama Tempat</label>
														<div class="col-md-10 p-0">
															<input id="title" name="title" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline align-items-start">
														<label for="gambar_update" class="col-md-2 form-label justify-content-start">Gambar</label>
														<div class="col-md-10 p-0">
															<input id="gambar_update" name="gambar_update" type="file" class="form-control input-full">
															<input type="hidden" name="old_thumb" id="old_thumb">
															<img src="https://demo.getstisla.com/assets/img/avatar/avatar-1.png" alt="avatar" class="img-fluid img-thumbnail mt-2" id="prevThumb" style="max-width: 300px">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="tipe" class="col-md-2 form-label justify-content-start">Tipe Tempat</label>
														<div class="col-md-10 p-0">
															<select class="form-control input-full" id="tipe" name="tipe">
																<option value="tour">Tempat Wisata</option>
																<option value="hotel">Hotel</option>
																<option value="worship">Tempat Ibadah</option>
															</select>
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="alamat" class="col-md-2 form-label justify-content-start">Alamat</label>
														<div class="col-md-10 p-0">
															<input id="alamat" name="alamat" type="text" class="form-control input-full">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="latitude" class="col-md-2 form-label justify-content-start">Latitude</label>
														<div class="col-md-10 p-0">
															<input id="latitude" name="latitude" type="text" class="form-control input-full" placeholder="masukkan latitude">
														</div>
													</div>
													<div class="form-group form-inline">
														<label for="longtitude" class="col-md-2 form-label justify-content-start">Longtitude</label>
														<div class="col-md-10 p-0">
															<input id="longtitude" name="longtitude" type="text" class="form-control input-full" placeholder="masukkan longtitude">
														</div>
													</div>
													<div class="form-group form-inline align-items-start">
														<label for="desc" class="col-md-2 form-label justify-content-start">Deskripsi</label>
														<textarea class="form-control input-full col-md-10" name="desc" id="desc" rows="20"></textarea>
													</div>
													<div class="form-group form-inline">
														<label for="select_place_tag" class="col-md-2 form-label justify-content-start">Tag</label>
														<div class="col-md-8 p-0">
															<select id="select_place_tag" name="tag[]" class="form-control custom-select w-100" multiple>
																
															</select>
														</div>
														<div class="col-md-2 d-flex justify-content-end p-0">
															<a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addTagModal">Tambah Tag</a>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="d-flex justify-content-end">
												<button type="submit" class="btn btn-primary" id="editPlace">Ubah</button>
											</div>
										</form>
									</div>
									<div class="tab-pane" id="images" role="tabpanel">
										<div class="row" id="fieldImage">
											<div class="col-md-3 col-sm-4 col-6 mb-2" id="fieldUpload">
												<form id="uploadFile" enctype="multipart/form-data">
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="custom-file">
																<input type="file" name="files" class="update-file" id="updateFile" aria-describedby="inputGroupFileAddon01">
																<label class="custom-file-label" for="updateFile">Choose file</label>
															</div>
														</div>
													</div>
													<div class="progress" style="display: none">
														<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('modal')
<div class="modal fade" id="addTagModal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="card modal-content">
			<div class="modal-header">
				<h4 class="card-title">Tambah Tag</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card-body">
				<form class="forms-sample" id="formAddTag" autocomplete="off">
					<div class="form-group form-inline align-items-start">
						<label for="nama_tag" class="col-md-2">Nama Tag</label>
						<div class="col-md-10">
							<input type="text" class="form-control input-full" id="nama_tag" name="nama_tag" placeholder="masukkan nama tag">
						</div>
					</div>
					<hr>
					<div class="d-flex justify-content-end">
						<button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm" id="addTag">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	{{-- Tiny MCE 5 --}}
	<script src="{{ asset('t_admin') }}/js/tinymce/jquery.tinymce.min.js" referrerpolicy="origin"></script>
	<script src="{{ asset('t_admin') }}/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
	<!-- My Script -->
	<script>
		const id = '{{ $id }}'
		$(document).ready(function() {
			getDetailForUpdate.loadData = id
			// Select2 : tag place
			$('#select_place_tag').select2({
				theme: 'bootstrap4',
				language: "{{ app()->getLocale() }}",
				allowClear: true,
				ajax: {
					url: "{{ route('tags.select') }}",
					dataType: 'json',
					delay: 250,
					processResults: function(data) {
						return {
							results: $.map(data, function(item) {
								return {
									text: item.name,
									id: item.id
								}
							})
						}
					}
				}
			})

			// text editor deskripsi (TinyMCE5)
			$('#desc').tinymce({
				relative_urls: false,
				language: 'en',
				plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table directionality",
					"emoticons template paste textpattern",
				],
				toolbar1: "fullscreen preview",
				toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media",
			})
		})

		// detail for update
		const getDetailForUpdate = {
			set loadData(data) {
				const urlDetail = URL_DATA + "/place/" + data
				Functions.prototype.requestDetail(getDetailForUpdate, urlDetail)
			},
			set successData(response) {
				$('#id').val(response.place.id)
				$('#title').val(response.place.title)
				$('#prevThumb').attr('src', PICT + '/thumbnail/' + response.place.thumbnail)
				$('#old_thumb').val(response.place.thumbnail)
				$('#tipe option[value=' + response.place.type + ']').prop('selected', true)
				$('#alamat').val(response.place.address)
				$('#latitude').val(response.place.latitude)
				$('#longtitude').val(response.place.longtitude)
				setTimeout(function() {
					tinyMCE.get("desc").setContent(response.place.desc);
				}, 5000);
				// selected tags
				var tagSelect = $('#select_place_tag');
				$.ajax({
					type: 'GET',
					url: URL_DATA + "/place/" + id
				}).then(function (data) {
					// create the option and append to Select2
					const selected = []
					for (let i = 0; i < data.tags.length; i++) {
						selected[i] = new Option(data.tags[i].name, data.tags[i].id, true, true)
					}
					tagSelect.append(selected).trigger('change');

					// manually trigger the `select2:select` event
					tagSelect.trigger({
						type: 'select2:select',
						params: {
							data: data
						}
					});
				});

				// pictures form gallery
				var picts = response.place.pictures
				if(picts.length > 0) {
					var listImage = ""
					picts.map(picture => {
						listImage += `
							<div class="col-md-3 col-sm-4 col-6 mb-2">
								<img src="${PICT + '/galleries/' + picture.picture}" alt="${PICT + '/galleries/' + picture.picture}" class="img-responsive img-fluid img-thumbnail">
								<button class="btn btn-sm btn-danger delImage" data-image-id="${picture.id}">
									<i class="fas fa-times"></i>
								</button>
							</div>`
					})
					$('#fieldUpload').before(listImage)
				}
			},
			set errorData(err) {
				console.log(err);
			}
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('t_admin/js/admin/tempat/index.js') }}"></script>
	<script src="{{ asset('t_admin/js/admin/tempat/image.js') }}"></script>
	{{-- Select2 --}}
	<script src="{{ asset('t_admin') }}/js/select2/select2.min.js"></script>
	<script src="{{ asset('t_admin/js/select2/i18n/' . app()->getLocale() . '.js') }}"></script>
@endsection