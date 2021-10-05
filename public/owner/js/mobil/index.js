$(document).ready(function () {
    // CRUD
    addCar()
    // deletePlace()
    // updatePlace()
    // verify()
    // unverify()
})

// CRUD
function addCar() {
    $('#formAddCar').validate({
        rules: {
            nopol: {
                required: true
            },
            namaMobil: {
                required: true
            },
            tahun: {
                required: true
            },
            hargaRent: {
                required: true
            },
            hargaBeli: {
                required: true
            },
            bbm: {
                required: true
            },
            penumpang: {
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
            const urlPost = URL_DATA + "/add/car"
            const formData = new FormData()
            const data = {
                user_id: user_id,
                nopol: $('#nopol').val(),
                namaMobil: $('#namaMobil').val(),
                tahun: $('#tahun').val(),
                hargaRent: $('#hargaRent').val(),
                hargaBeli: $('#hargaBeli').val(),
                bbm: $('#bbm').val(),
                penumpang: $('#penumpang').val(),
            }
            formData.append('user_id', data.user_id)
            formData.append('nopol', data.nopol)
            formData.append('namaMobil', data.namaMobil)
            formData.append('tahun', data.tahun)
            formData.append('hargaRent', data.hargaRent)
            formData.append('hargaBeli', data.hargaBeli)
            formData.append('bbm', data.bbm)
            formData.append('penumpang', data.penumpang)
            
            Functions.prototype.postRequest(postCar, urlPost, data)
        }
    })

    const postCar = {
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
                $('#formAddCar')[0].reset()
                $('#nopol').removeClass('is-valid')
                $('#namaMobil').removeClass('is-valid')
                $('#tahun').removeClass('is-valid')
                $('#hargaRent').removeClass('is-valid')
                $('#hargaBeli').removeClass('is-valid')
                $('#bbm').removeClass('is-valid')
                $('#penumpang').removeClass('is-valid')
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