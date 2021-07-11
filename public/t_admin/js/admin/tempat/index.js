$(document).ready(function () {
    // CRUD
    addPlace()
})

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
                        console.log($("#gambar").val())
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