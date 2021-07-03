$(document).ready(function () {
    getSocials.loadData = user_id;
    addSocial()
    deleteSocials()
})

const getSocials = {
    set loadData(data) {
        const URL = URL_DATA + "/social/all/" + data;
        Functions.prototype.getRequest(getSocials, URL);
    },
    set successData(response) {
        const container = document.getElementById('socials');
        const social = response.data;
        container.innerHTML = '';

        if (social.length == 0) {
            container.innerHTML += `
            <div class="card-footer mb-0">
                <div class="row user-stats text-center">
                    <div class="col">
                        <div class="title">You have no social media</div>
                    </div>
                </div>
            </div>
            `;
        }

        for (i = social.length-1; i >= 0; i--) {
            container.innerHTML += `
            <div class="item-list">
                <div class="info-user ml-3">
                <div class="username"><a href="${social[i].link}">${social[i].name}</a></div>
                <div class="status">${social[i].link}</div>
                </div>
                <button class="btn btn-icon btn-danger btn-round btn-xs delete" type="button" data-id="${social[i].id}">
                <i class="fa fa-times"></i>
                </button>
            </div>
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

function addSocial() {
    $('#formAddSocial').validate({
        rules: {
            name: {
                required: true
            },
            short_name: {
                required: true,
            },
            link: {
                required: true,
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
            const urlPost = URL_DATA + "/add/social"
            const data = {
                user_id: user_id,
                name: $('#name').val(),
                short_name: $('#short_name').val(),
                link: $('#link').val(),
            }
            Functions.prototype.postRequest(postSocial, urlPost, data)
        }
    })

    const postSocial = {
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
                getSocials.loadData = user_id;
                $('#formAddSocial')[0].reset()
                $('#name').removeClass('is-valid')
                $('#short_name').removeClass('is-valid')
                $('#link').removeClass('is-valid')
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

function deleteSocials() {
    $('#socials').on('click', 'div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/social/" + id
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Yes, delete it!',
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
            getSocials.loadData = user_id;
        });
    })
}