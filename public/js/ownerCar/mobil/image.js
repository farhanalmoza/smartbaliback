$('.update-file').on('change', function(e) {
    e.preventDefault()
    const files = document.getElementById('updateFile').files
    const urlUpload = URL_DATA + "/upload-car-picture"

    Functions.prototype.uploadImage(files[0], urlUpload, id)
})

$('#fieldImage').on('click', 'div .delImage', function(e) {
    e.preventDefault()
    const image_id = $(this).data('image-id')
    const urlDeleteImage = URL_DATA + "/delete-picture/" + image_id
    Swal.fire({
      title: 'Yakin ingin menghapus gambar ini?',
      text: "gambar akan dihapus permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).parent().remove()
        Functions.prototype.deleteData(urlDeleteImage);
      }
    })
})