$(document).ready(function () {
    // CRUD
    addTour()
    deleteTour()
    updateTour()
})

const getTours = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getTours, URL);
    },
    set successData(response) {
        const container = document.getElementById('place-cards')

        const tours = response.data
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
                            <a href="${BASE_URL}/owner-tour/wisata/${tours[i].id}" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                            <div class="d-flex justify-content-end">
                                <a href="${BASE_URL}/owner-tour/edit-wisata/${tours[i].id}">
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

        if (container.innerHTML == '') {
            if (tours.length == 0) {
                container.innerHTML += `
                    <div class="col-md-12">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center pb-3">
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers text-center">
                                            <h4 class="card-title">Belum ada data yang ditambahkan</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                container.innerHTML += `
                    <div class="col-md-12">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center pb-3">
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers text-center">
                                            <h4 class="card-title">Tidak ada data yang terverifikasi</h4>
                                        </div>
                                    </div>
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

// CRUD
function addTour() {
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
            harga: {
                required: true
            },
            gambar: {
                required: true
            },
            alamat: {
                required: true
            },
            latitude: {
                required: true
            },
            longtitude: {
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
            const urlPost = URL_DATA + "/add/tour"
            const formData = new FormData()
            const data = {
                user_id: user_id,
                title: $('#title').val(),
                alamat: $('#alamat').val(),
                latitude: $('#latitude').val(),
                longtitude: $('#longtitude').val(),
                harga: $('#harga').val(),
                desc: $('#desc').val(),
                tag: $('#select_place_tag').val(),
            }
            const files = $("#gambar")[0].files
            const tags = $('#select_place_tag').val()
            formData.append('user_id', data.user_id)
            formData.append('title', data.title)
            formData.append('alamat', data.alamat)
            formData.append('latitude', data.latitude)
            formData.append('latitude', data.latitude)
            formData.append('longtitude', data.longtitude)
            formData.append('harga', data.harga)
            formData.append('desc', data.desc)
            
            for (let i = 0; i < tags.length; i++) {
                const element = tags[i];
                formData.append('tags[]', element);
            }
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
                $('#select_place_tag').val(null).trigger('change');
                $('#title').removeClass('is-valid')
                $('#gambar').removeClass('is-valid')
                $('#prevThumb').attr('hidden', true)
                $('#alamat').removeClass('is-valid')
                $('#latitude').removeClass('is-valid')
                $('#longtitude').removeClass('is-valid')
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

function updateTour() {
    $("#gambar_update").on("change", function (e) {
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
    });
    $('#formEditPlace').validate({
        rules: {
            title: {
                required: true
            },
            alamat: {
                required: true
            },
            latitude: {
                required: true
            },
            longtitude: {
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
            const urlPut = URL_DATA + "/update/tour/" + $('#id').val()
            const formData = new FormData()
            const data = {
                user_id:    user_id,
                title:      $('#title').val(),
                alamat:     $('#alamat').val(),
                latitude:   $('#latitude').val(),
                longtitude: $('#longtitude').val(),
                desc:       $('#desc').val(),
                gambar:     $('#old_thumb').val(),
                tag:        $('#select_place_tag').val(),
            }
            const files = $("#gambar_update")[0].files
            const tags = $('#select_place_tag').val()
            formData.append('user_id', data.user_id)
            formData.append('title', data.title)
            formData.append('alamat', data.alamat)
            formData.append('latitude', data.latitude)
            formData.append('latitude', data.latitude)
            formData.append('longtitude', data.longtitude)
            formData.append('desc', data.desc)

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const element = files[i];
                    formData.append('files[]', element)
                }
            } else {
                formData.append('files', data.gambar)
            }
            for (let i = 0; i < tags.length; i++) {
                const element = tags[i];
                formData.append('tags[]', element);
            }
            // console.log($('#old_thumb').val())
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataPlace)
        }
    })
    const putDataPlace = {
        set successData(response) {
            $('#title').removeClass('is-valid')
            $('#gambar').removeClass('is-valid')
            $('#alamat').removeClass('is-valid')
            $('#latitude').removeClass('is-valid')
            $('#longtitude').removeClass('is-valid')
            $('#desc').removeClass('is-valid')
        },
    }
}

function deleteTour() {
    $('.place').on('click', 'div div div div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/tour/" + id
        swal({
            title: 'Apa kamu yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Ya, hapus!',
                    className : 'btn btn-success'
                },
                cancel: {
                    text: 'Batal',
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
            var pathname = window.location.pathname;
            getTours.loadData = "/wisata"
        })
    })
}