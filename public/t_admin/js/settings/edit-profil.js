$(document).ready(function () {
    getDetail.loadData = email
    updatePicture()
    updateProfile()
    gantiPass()
});

const getDetail = {
    set loadData(data) {
        const url = URL_DATA + "/pengaturan/profile/" + data
        Functions.prototype.requestDetail(getDetail, url)
    },
    set successData(response) {
        $('#prevPict').attr('src', PICT + "/profile/" + response.picture)
        $('.email').text(response.email)
        $('#nama').val(response.name)
        $('#phone').val(response.phone)
        $('#alamat').val(response.address)
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

function updatePicture() {
    $('#picture').on('change', function (e) {
        e.preventDefault()

        if(Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#prevPict'))
            data.append('picture', file[0])
            setTimeout(() => {
                const dataImg = $('#prevPict').attr('src')
                Swal.fire({
                    html: `
                        <img src="${dataImg}" alt="avatar" class="img-fluid img-thumbnail">
                    `,
                    title: 'Apakah logo yang dipilih sudah benar?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const url = URL_DATA + "/pengaturan/update/ganti-foto/" + email
                        Functions.prototype.uploadFile(url, data, 'post')
                    } else {
                        $('#prevPict').attr('src', "https://demo.getstisla.com/assets/img/avatar/avatar-1.png")
                    }
                })
            }, 100);
        }
    })
}

function updateProfile() {
    $('#phone').mask('0000-0000-0000')
    $('#updateProfile').validate({
        rules: {
            nama: {
                required: true
            },
            phone: {
                required: true
            },
            alamat: {
                required: true
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
        
            if (element.prop('type') === 'checkbox') {
              error.insertAfter(element.parent('label'));
            } else {
              error.insertAfter(element);
            }
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
            const url = URL_DATA + "/pengaturan/update/edit-profile/" + email
            const data = $('#updateProfile').serialize()
            Functions.prototype.httpRequest(url, data, 'put')
            getDetail.loadData = email
            $('#nama').removeClass('is-valid')
            $('#phone').removeClass('is-valid')
            $('#alamat').removeClass('is-valid')
        }
    })
}

function gantiPass() {
    $('#gantiPass').validate({
        rules: {
            password_lama: {
                required: true,
                minlength: 8
            },
            password_baru: {
                required: true,
                minlength: 8
            },
            password_konfirm: {
                required: true,
                equalTo: "#password_baru"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
        
            if (element.prop('type') === 'checkbox') {
              error.insertAfter(element.parent('label'));
            } else {
              error.insertAfter(element);
            }
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
            const url = URL_DATA + "/pengaturan/update/ganti-password"
            const data = {
                old_pass: $('#password_lama').val(),
                new_pass: $('#password_baru').val(),
                confirm_pass: $('#password_konfirm').val(),
            }
            Functions.prototype.updateData(url, data, 'put')
            $('#gantiPass')[0].reset()
            $('#password_lama').removeClass('is-valid')
            $('#password_baru').removeClass('is-valid')
            $('#password_konfirm').removeClass('is-valid')
        }
    })
}