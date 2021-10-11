$(document).ready(function () {
    // verifikasi data
    verify()
    unverify()
})

function verify() {
    $('.detail').on('click', '.verify', function(e) {
        const id = $(this).data('id')
        const urlVerify = URL_DATA + "/verify/car/" + id
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
        const urlUnverify = URL_DATA + "/unverify/car/" + id
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