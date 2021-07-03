$(document).ready(function () {
    getPortfolio.loadData = user_id;
    addPortfolio()
    updatePortfolio()
    getDetailForUpdate()
    deletePortfolio()
})

const getPortfolio = {
    set loadData(data) {
        const URL = URL_DATA + "/portfolio/all/" + data;
        Functions.prototype.getRequest(getPortfolio, URL);
    },
    set successData(response) {
        const container = document.getElementById('portfolio-card');
        const portfolios = response.data;
        container.innerHTML = '';

        for (i = portfolios.length-1; i >= 0; i--) {
            container.innerHTML += `
            <div class="col-md-4">
                <div class="card card-post card-round">
                <img class="card-img-top picture" src="${ASSET}/portfolio_picture/${portfolios[i].picture}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">
                    <a href="${portfolios[i].link}" class="name link">
                        ${portfolios[i].name} 
                    </a>
                    </h3>
                    <p class="card-text desc">${portfolios[i].desc}</p>
                    <button type="button" class="btn btn-primary btn-rounded btn-sm update" data-id="${portfolios[i].id}" data-toggle="modal" data-target="#updatePortModal">edit</button>
                    <button type="button" class="btn btn-danger btn-rounded btn-sm delete" data-id="${portfolios[i].id}">delete</button>
                </div>
                </div>
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

function addPortfolio() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const file = $(this)[0].files;
            Functions.prototype.prevImage(file[0], $("#prevProject"));
        }
    });
    $('#formAddPortfolio').validate({
        rules: {
            name: {
                required: true
            },
            picture: {
                required: true,
            },
            link: {
                required: true,
            },
            desc: {
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
            const urlPost = URL_DATA + "/add/portfolio"
            const formData = new FormData()
            const data = {
                user_id: user_id,
                name: $('#name').val(),
                link: $('#link').val(),
                desc: $('#desc').val(),
            }
            const files = $("#picture")[0].files
            formData.append('user_id', data.user_id)
            formData.append('name', data.name)
            formData.append('link', data.link)
            formData.append('desc', data.desc)
            // console.log(files)
            for (let i = 0; i < files.length; i++) {
                const element = files[i];
                formData.append('files[]', element)
            }
            Functions.prototype.uploadFile(urlPost, formData, 'post', postPortfolio)
        }
    })

    const postPortfolio = {
        set successData(response) {
			// var content = {};

            // content.title = 'Success'
            // content.message = response.message;
            // content.icon = 'fa fa-check';

			// $.notify(content,{
			// 	type: 'success',
			// 	placement: {
			// 		from: 'top',
			// 		align: 'right'
			// 	},
			// 	time: 1000,
			// 	delay: 3000,
			// });
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                getPortfolio.loadData = user_id;
                $('#formAddPortfolio')[0].reset()
                $('#addPortModal').modal('hide')
                $('#name').removeClass('is-valid')
                $('#picture').removeClass('is-valid')
                $("#prevProject").attr('src', ASSET + "/portfolio_picture/default.png", $("#prevProject"))
                $('#link').removeClass('is-valid')
                $('#desc').removeClass('is-valid')
            }
        },
        // set errorData(err) {
        //     var content = {};

        //     content.title = 'Error';
		// 	content.message = err.responseJSON.message;
        //     content.icon = 'fa fa-times';

		// 	$.notify(content,{
		// 		type: 'danger',
		// 		placement: {
		// 			from: 'top',
		// 			align: 'right'
		// 		},
		// 		time: 1000,
        //         delay: 10000,
		// 	});
        // }
    }
}

function updatePortfolio() {
    $("#update_picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const file = $(this)[0].files;
            Functions.prototype.prevImage(file[0], $("#prevUpdateProject"));
        }
    });
    $('#formUpdatePortfolio').validate({
        rules: {
            update_name: {
                required: true
            },
            update_link: {
                required: true,
            },
            update_desc: {
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
        // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form, e) {
            e.preventDefault()
            const urlPut = URL_DATA + "/update/portfolio/" + $('#id').val()
            const formData = new FormData()
            const data = {
                user_id: user_id,
                name: $('#update_name').val(),
                picture: 'l',
                link: $('#update_link').val(),
                desc: $('#update_desc').val(),
            }
            const files = $("#update_picture")[0].files
            formData.append('user_id', data.user_id)
            formData.append('name', data.name)
            formData.append('link', data.link)
            formData.append('desc', data.desc)
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const element = files[i];
                    formData.append('files[]', element)
                }
            } else {
                formData.append('files', $('#old_pict').val())
            }
            // console.log(formData.getAll('files[]'))
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataPortfolio)
            // Functions.prototype.putRequest(putDataPortfolio, urlPut, data)
        }
    })
    const putDataPortfolio = {
        set successData(response) {
            // var content = {};

            // content.title = 'Success';
			// content.message = response.message;
            // content.icon = 'fa fa-check';

			// $.notify(content,{
			// 	type: 'success',
			// 	placement: {
			// 		from: 'top',
			// 		align: 'right'
			// 	},
			// 	time: 1000,
            //     delay: 5000,
			// });
            getPortfolio.loadData = user_id;
            $('#formUpdatePortfolio')[0].reset()
            $('#updatePortModal').modal('hide')
            $('#update_name').removeClass('is-valid')
            $('#update_picture').removeClass('is-valid')
            $("#prevUpdateProject").attr('src', ASSET + "/portfolio_picture/default.png", $("#prevProject"))
            $('#update_link').removeClass('is-valid')
            $('#update_desc').removeClass('is-valid')
        },
        // set errorData(err) {
        //     var content = {};

        //     content.title = 'Error';
		// 	content.message = err.responseJSON.message;
        //     content.icon = 'fa fa-times';

		// 	$.notify(content,{
		// 		type: 'danger',
		// 		placement: {
		// 			from: 'top',
		// 			align: 'right'
		// 		},
		// 		time: 1000,
        //         delay: 10000,
		// 	});
        // }
    }
}

function getDetailForUpdate() {  
    $('#portfolio-card').on('click', 'div div .update', function(e) {
        const id = $(this).data('id')
        getDetailUpdate.loadData = id
    })

    const getDetailUpdate = {
        set loadData(data) {
            const urlDetail = URL_DATA + "/portfolio/" + data
            Functions.prototype.requestDetail(getDetailUpdate, urlDetail)
        },
        set successData(response) {
            $('#id').val(response.id)
            $('#update_name').val(response.name)
            $('#prevUpdateProject').attr('src', ASSET + '/portfolio_picture/' + response.picture)
            $('#old_pict').val(response.picture)
            $('#update_link').val(response.link)
            $('#update_desc').val(response.desc)
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

function deletePortfolio() {
    $('#portfolio-card').on('click', 'div div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/portfolio/" + id
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
            getPortfolio.loadData = user_id;
        });
    })
}