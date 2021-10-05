$(document).ready(function () {
    getCars.loadData = '/mobil'

    // CRUD
    addCar()
    // deletePlace()
    // updatePlace()
    // verify()
    // unverify()
})

const getCars = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getCars, URL);
    },
    set successData(response) {
        const keyword = document.getElementById('keyword')
        const container = document.getElementById('car-cards')

        const cars = response.data
        if (container) {
            container.innerHTML = '';
    
            for (i = cars.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-category text-info mb-1">${cars[i].no_car}</p>
                            <h3 class="card-title">
                                <a href="#">
                                    ${cars[i].name}
                                </a>
                            </h3>
                            <p class="card-text">Keluaran tahun ${cars[i].year_production}<br>Harga sewa : Rp. ${cars[i].rent_price}</p>
                            <a href="#" class="btn btn-primary btn-rounded btn-sm">Baca</a>
                        </div>
                    </div>
                </div>
                `;
            }
        }

        if (container.innerHTML == '') {
            if (cars.length == 0) {
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
            }
        }

        // keyword.addEventListener('keyup', function() {
        //     var xhr = new XMLHttpRequest()
        //     xhr.onreadystatechange = function() {
        //         if ( xhr.readyState == 4 && xhr.status == 200 ) {
        //             console.log('its work')
        //         }
        //     }
        //     xhr.open('GET', search.loadData = "/wisata/" + keyword.value, true)
        // })
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