$(document).ready(function () {  
    // get tags
    getTags.loadData = "/tag"
    // CRUD
    addTag()
    deleteTags()
})

const getTags = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getTags, URL);
    },
    set successData(response) {
        const container = document.getElementById('tags');
        const tags = response.data;
        container.innerHTML = '';

        for (i = tags.length-1; i >= 0; i--) {
            container.innerHTML += `
            <label class="selectgroup-item mb-2">
                <input type="checkbox" name="value" value="${tags[i].name}" class="selectgroup-input tag" id="${tags[i].id}">
                <span class="selectgroup-button d-flex">
                    ${tags[i].name}
                    <button type="button" class="btn btn-link btn-danger pl-1 py-0 pr-0 delete" data-id="${tags[i].id}">
                        <i class="fa fa-times"></i>
                    </button>
                </span>
            </label>
            `;
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

function addTag() {
    $('#formAddTag').validate({
        rules: {
            nama_tag: {
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
                getTags.loadData = "/tag"
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

function deleteTags() {
    $('#tags').on('click', 'label span .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/tag/" + id
        swal({
            title: 'Apa Anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Ya, hapus!',
                    className : 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                Functions.prototype.deleteData(urlDelete);
            } else {
                swal.close();
            }
            getTags.loadData = "/tag";
        });
    })
}