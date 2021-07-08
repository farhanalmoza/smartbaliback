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
            address: {
                required: true
            },
            coordinate: {
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
            const urlPost = URL_DATA + "/add/tag"
            const data = {
                nama_tag: $('#nama_tag').val(),
            }
            Functions.prototype.postRequest(postTag, urlPost, data)
        }
    })

    const postTag = {
        set successData(response) {
			var content = {};

            content.title = 'Success'
            content.message = response.message;
            content.icon = 'fa fa-check';

			$.notify(content,{
				type: 'success',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
				delay: 3000,
			});
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                $('#formAddTag')[0].reset()
                $('#addTagModal').modal('hide')
                $('#nama_tag').removeClass('is-valid')
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