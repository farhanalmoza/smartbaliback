$('.update-file').on('change', function(e) {
    e.preventDefault()
    const files = document.getElementById('updateFile').files
    const urlUpload = URL_DATA + "/upload-picture"

    Functions.prototype.uploadImage(files[0], urlUpload, id)
})