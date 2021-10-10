$(document).ready(function() {
    addDriver()
})

function addDriver() {
    $('#formAddDriver').validate({
        rules: {
            nama: {
                required: true
            },
            alamat: {
                required: true
            },
            noHp: {
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
            const urlPost = URL_DATA + "/add/driver"
            const formData = new FormData()
            const data = {
                user_id: user_id,
                nama:    $('#nama').val(),
                alamat:  $('#alamat').val(),
                noHp:    $('#noHp').val(),
            }
            formData.append('user_id', data.user_id)
            formData.append('nama', data.nama)
            formData.append('alamat', data.alamat)
            formData.append('noHp', data.noHp)
            
            Functions.prototype.postRequest(postDriver, urlPost, data)
        }
    })

    const postDriver = {
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
                $('#formAddDriver')[0].reset()
                $('#nama').removeClass('is-valid')
                $('#alamat').removeClass('is-valid')
                $('#noHp').removeClass('is-valid')
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
