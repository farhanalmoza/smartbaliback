$(document).ready(function () {
    verify()
    unverify()
})

const getVerifyPlaces = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getVerifyPlaces, URL);
    },
    set successData(response) {
        const container = document.getElementById('place-cards')

        const places = response.data
        if (container) {
            container.innerHTML = '';
    
            for (i = places.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="${PICT + '/thumbnail/' + places[i].thumbnail}" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">${places[i].title}</p>
                                <p class="date text-muted">${places[i].address}</p>
                            </div>
                            <div class="separator-solid"></div>
                            <a href="${BASE_URL}/admin/tempat/${places[i].slug}/${places[i].id}" class="btn btn-primary btn-rounded btn-sm">Baca</a>
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

const getUnverifiedPlaces = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getUnverifiedPlaces, URL);
    },
    set successData(response) {
        const container = document.getElementById('unverified-places')

        const places = response.data
        if (container) {
            container.innerHTML = '';
    
            for (i = places.length-1; i >= 0; i--) {
                container.innerHTML += `
                <div class="col-md-4">
                    <div class="card card-post card-round">
                        <img class="card-img-top" src="${PICT + '/thumbnail/' + places[i].thumbnail}" alt="Card image cap">
                        <div class="card-body">
                            <div class="info-post ml-2">
                                <p class="username">${places[i].title}</p>
                                <p class="date text-muted">${places[i].address}</p>
                            </div>
                            <div class="separator-solid"></div>
                            <a href="${BASE_URL}/admin/tempat/${places[i].slug}/${places[i].id}" class="btn btn-primary btn-rounded btn-sm">Baca</a>
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

function verify() {
    $('.detail').on('click', '.verify', function(e) {
        const id = $(this).data('id')
        const urlVerify = URL_DATA + "/verify/place/" + id
        swal({
            title: 'Apa Anda yakin?',
            text: "Anda akan memverifikasi data ini!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Ya, verifikasi!',
                    className : 'btn btn-success'
                },
                cancel: {
                    text: 'batal',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                const data = {
                    verify: 'true',
                }
                Functions.prototype.updateData(urlVerify, data, 'put');
            } else {
                swal.close();
            }
        })
    })
}

function unverify() {
    $('.detail').on('click', '.unverify', function(e) {
        const id = $(this).data('id')
        const urlUnverify = URL_DATA + "/unverify/place/" + id
        swal({
            title: 'Apa Anda yakin?',
            text: "Data ini tidak lolos verifikasi!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Ya, lanjutkan!',
                    className : 'btn btn-success'
                },
                cancel: {
                    text: 'batal',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                const data = {
                    verify: 'false',
                }
                Functions.prototype.updateData(urlUnverify, data, 'put');
            } else {
                swal.close();
            }
        })
    })
}