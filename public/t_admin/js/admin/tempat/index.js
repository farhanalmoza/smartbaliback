$(document).ready(function () {
    // get all places
    getTours.loadData = "/wisata"
    getHotels.loadData = "/hotel"
    getWorships.loadData = "/tempat-ibadah"
    // CRUD
    addPlace()
    deletePlace()
    getDetail.loadData = id
    updatePortfolio()
})

const getTours = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getTours, URL);
    },
    set successData(response) {
        const container = document.getElementById('tour-cards');
        const tours = response.data;
        if (container) {
            container.innerHTML = '';
    
            for (i = tours.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="${PICT + '/thumbnail/' + tours[i].thumbnail}" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">${tours[i].title}</p>
                                <p class="date text-muted">${tours[i].address}</p>
                            </div>
                            <div class="separator-solid"></div>
                            <p class="card-text">${tours[i].desc.slice(0,100)} ...</p>
                            <a href="${BASE_URL}/admin/tempat/${tours[i].slug}/${tours[i].id}" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            <div class="d-flex justify-content-end">
                                <a href="${BASE_URL}/admin/edit-tempat/${tours[i].id}">
                                    <button type="button" class="btn btn-icon btn-link btn-primary"><i class="fa fa-edit"></i></button>
                                </a>
                                <button type="button" class="btn btn-icon btn-link btn-danger delete" data-id="${tours[i].id}"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
        }
    },
    set errorData(err) {
        var content = {};
        content.title = "Error";
        content.message = err.responseJSON.message;
        content.icon = "fa fa-times";
        $.notify(content, {
            type: "danger",
            placement: {
                from: "top",
                align: "right",
            },
            time: 1000,
            delay: 10000,
        });
    },
}

const getHotels = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getHotels, URL);
    },
    set successData(response) {
        const container = document.getElementById('hotel-cards');
        const hotels = response.data;
        if (container) {
            container.innerHTML = '';
    
            for (i = hotels.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="${PICT + '/thumbnail/' + hotels[i].thumbnail}" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">${hotels[i].title}</p>
                                <p class="date text-muted">${hotels[i].address}</p>
                            </div>
                            <div class="separator-solid"></div>
                            <p class="card-text">${hotels[i].desc.slice(0,100)} ...</p>
                            <a href="${BASE_URL}/admin/tempat/${hotels[i].slug}/${hotels[i].id}" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            <div class="d-flex justify-content-end">
                                <a href="${BASE_URL}/admin/edit-tempat/${hotels[i].id}">
                                    <button type="button" class="btn btn-icon btn-link btn-primary"><i class="fa fa-edit"></i></button>
                                </a>
                                <button type="button" class="btn btn-icon btn-link btn-danger delete" data-id="${hotels[i].id}"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
        }
    },
    set errorData(err) {
        var content = {};
        content.title = "Error";
        content.message = err.responseJSON.message;
        content.icon = "fa fa-times";
        $.notify(content, {
            type: "danger",
            placement: {
                from: "top",
                align: "right",
            },
            time: 1000,
            delay: 10000,
        });
    },
}

const getWorships = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getWorships, URL);
    },
    set successData(response) {
        const container = document.getElementById('worship-cards');
        const worships = response.data;
        if (container) {
            container.innerHTML = '';
    
            for (i = worships.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="${PICT + '/thumbnail/' + worships[i].thumbnail}" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">${worships[i].title}</p>
                                <p class="date text-muted">${worships[i].address}</p>
                            </div>
                            <div class="separator-solid"></div>
                            <p class="card-text">${worships[i].desc.slice(0,100)} ...</p>
                            <a href="${BASE_URL}/admin/tempat/${worships[i].slug}/${worships[i].id}" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            <div class="d-flex justify-content-end">
                                <a href="${BASE_URL}/admin/edit-tempat/${worships[i].id}">
                                    <button type="button" class="btn btn-icon btn-link btn-primary"><i class="fa fa-edit"></i></button>
                                </a>
                                <button type="button" class="btn btn-icon btn-link btn-danger delete" data-id="${worships[i].id}"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
        }
    },
    set errorData(err) {
        var content = {};
        content.title = "Error";
        content.message = err.responseJSON.message;
        content.icon = "fa fa-times";
        $.notify(content, {
            type: "danger",
            placement: {
                from: "top",
                align: "right",
            },
            time: 1000,
            delay: 10000,
        });
    },
}

function addPlace() {
    $("#gambar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#prevThumb'))
            data.append('logo', file[0])
            setTimeout(() => {
                const dataImg = $('#prevThumb').attr('src')
                Swal.fire({
                    html: `
                        <img src="${dataImg}" alt="avatar" class="img-fluid img-thumbnail">
                    `,
                    title: 'Apakah gambar yang dipilih sudah benar?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#prevThumb').removeAttr('hidden')
                    } else {
                        $('#prevThumb').attr('hidden', true)
                        $("#gambar").val(null)
                    }
                })
            }, 100);
        }
    })

    $('#formAddPlace').validate({
        rules: {
            title: {
                required: true
            },
            gambar: {
                required: true
            },
            alamat: {
                required: true
            },
            koordinat: {
                required: true
            },
            desc: {
                required: true
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        // // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        // // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form, e) {
            e.preventDefault()
            const urlPost = URL_DATA + "/add/place"
            const formData = new FormData()
            const data = {
                title: $('#title').val(),
                tipe: $('#tipe').val(),
                alamat: $('#alamat').val(),
                koordinat: $('#koordinat').val(),
                desc: $('#desc').val(),
            }
            const files = $("#gambar")[0].files
            formData.append('title', data.title)
            formData.append('tipe', data.tipe)
            formData.append('alamat', data.alamat)
            formData.append('koordinat', data.koordinat)
            formData.append('desc', data.desc)
            
            for (let i = 0; i < files.length; i++) {
                const element = files[i];
                formData.append('files[]', element)
            }
            Functions.prototype.uploadFile(urlPost, formData, 'post', postPlace)
        }
    })

    const postPlace = {
        set successData(response) {
            
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                $('#formAddPlace')[0].reset()
                $('#title').removeClass('is-valid')
                $('#gambar').removeClass('is-valid')
                $('#tipe').removeClass('is-valid')
                $('#alamat').removeClass('is-valid')
                $('#koordinat').removeClass('is-valid')
                $('#desc').removeClass('is-valid')
            }
        },
        set errorData(err) {
            var content = {};

            content.title = 'Error';
			content.message = err.responseJSON.message;
            content.icon = 'fa fa-times';

			$.notify(content,{
				type: 'danger',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
                delay: 10000,
			});
        }
    }
}

const getDetail = {
    set loadData(data) {
        const urlDetail = URL_DATA + "/place/" + data
        Functions.prototype.requestDetail(getDetail, urlDetail)
    },
    set successData(response) {
        // for preview detail
        $('#thumbnail').attr('src', PICT + '/thumbnail/' + response.thumbnail)
        $('#title').text(response.title)
        $('#address').text(response.address)
        $('#desc').text(response.desc)

        // for update
        $('#id').val(response.id)
        $('#title').val(response.title)
        $('#prevThumb').attr('src', PICT + '/thumbnail/' + response.thumbnail)
        $('#old_thumb').val(response.thumbnail)
        $('#tipe option[value=' + response.type + ']').prop('selected', true)
        $('#alamat').val(response.address)
        $('#koordinat').val(response.location)
    },
    set errorData(err) {
        console.log(err);
    }
}

function updatePortfolio() {
    $("#gambar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const file = $(this)[0].files;
            Functions.prototype.prevImage(file[0], $("#prevThumb"));
        }
    });
    $('#formEditPlace').validate({
        rules: {
            title: {
                required: true
            },
            alamat: {
                required: true
            },
            koordinat: {
                required: true
            },
            desc: {
                required: true
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form, e) {
            e.preventDefault()
            const urlPut = URL_DATA + "/update/place/" + $('#id').val()
            const formData = new FormData()
            const data = {
                title:      $('#title').val(),
                tipe:       $('#tipe').val(),
                alamat:     $('#alamat').val(),
                koordinat:  $('#koordinat').val(),
                desc:       $('#desc').val(),
            }
            const files = $("#gambar")[0].files
            formData.append('title', data.title)
            formData.append('tipe', data.tipe)
            formData.append('alamat', data.alamat)
            formData.append('koordinat', data.koordinat)
            formData.append('desc', data.desc)

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const element = files[i];
                    formData.append('files[]', element)
                }
            } else {
                formData.append('files', $('#old_pict').val())
            }
            
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataPlace)
        }
    })
    const putDataPlace = {
        set successData(response) {
            $('#title').removeClass('is-valid')
            $('#gambar').removeClass('is-valid')
            $('#tipe').removeClass('is-valid')
            $('#alamat').removeClass('is-valid')
            $('#koordinat').removeClass('is-valid')
            $('#desc').removeClass('is-valid')
        },
    }
}

function deletePlace() {
    $('.place').on('click', 'div div div div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/place/" + id
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Yes, delete it!',
                    className : 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                Functions.prototype.deleteData(urlDelete);
            } else {
                swal.close();
            }
            getTours.loadData = "/wisata"
            getHotels.loadData = "/hotel"
            getWorships.loadData = "/tempat-ibadah"
        })
    })
}