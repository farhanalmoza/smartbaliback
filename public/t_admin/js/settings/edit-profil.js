$(document).ready(function () {
    // getDetail.loadData = ""
    updatePicture()
    // updateDetailStore()
});

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