$(document).ready(function () {
    getEducations()
    addEducation()
    updateEducation()
    getDetailForUpdate()
    deleteEducation()
})

function getEducations() {
    const urlEdu = URL_DATA +  "/education/all/" + user_id
    const columns = [
        {data : 'school', name: 'school'},
        {data : 'major', name: 'major'},
        {data : 'year_in', name: 'year_in'},
        {data : 'year_out', name: 'year_out'},
        {data : 'address', name: 'address'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#dataTables", urlEdu, columns)
}

function addEducation() {
    $('#graduated').change(function() {
        if ($('#graduated').val() === 'no') {
            $('#year_out').attr('disabled', 'disabled')
            $('#score').attr('disabled', 'disabled')
        } else {
            $('#year_out').removeAttr('disabled', 'disabled')
            $('#score').removeAttr('disabled', 'disabled')
        }
    })
    $('#formAddEducation').validate({
        rules: {
            school: {
                required: true
            },
            year_in: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            year_out: {
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            score: {
                // required: true,
                number: true
            },
            address: {
                required: true
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
        
            if (element.prop('type') === 'checkbox') {
              error.insertAfter(element.parent('label'));
            } else {
              error.insertAfter(element);
            }
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
            const urlPost = URL_DATA + "/add/education"
            const data = {
                user_id: user_id,
                school: $('#school').val(),
                major: $('#major').val(),
                graduated: $('#graduated').val(),
                year_in: $('#year_in').val(),
                year_out: $('#year_out').val() ? $('#year_out').val() : null,
                score: $('#score').val() ? $('#score').val() : null,
                address: $('#address').val(),
            }
            Functions.prototype.postRequest(postEducation, urlPost, data)
        }
    })

    const postEducation = {
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
                getEducations()
                $('#formAddEducation')[0].reset()
                $('#addEduModal').modal('hide')
                $('#school').removeClass('is-valid')
                $('#major').removeClass('is-valid')
                $('#graduated').removeClass('is-valid')
                $('#year_in').removeClass('is-valid')
                $('#year_out').removeClass('is-valid')
                $('#score').removeClass('is-valid')
                $('#address').removeClass('is-valid')
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

function updateEducation() {
    $('#formUpdateEducation').validate({
        rules: {
            update_school: {
                required: true
            },
            update_year_in: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            update_year_out: {
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            update_score: {
                // required: true,
                number: true
            },
            update_address: {
                required: true
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
        
            if (element.prop('type') === 'checkbox') {
              error.insertAfter(element.parent('label'));
            } else {
              error.insertAfter(element);
            }
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
            const urlPost = URL_DATA + "/update/education/" + $('#id').val()
            const data = {
                school: $('#update_school').val(),
                major: $('#update_major').val(),
                graduated: $('#update_graduated').val(),
                year_in: $('#update_year_in').val(),
                year_out: $('#update_year_out').attr('disabled', false) ? $('#update_year_out').val() : null,
                score: $('#update_score').attr('disabled', false) ? $('#update_score').val() : null,
                address: $('#update_address').val(),
            }
            Functions.prototype.putRequest(putDataEducation, urlPost, data)
        }
    })
    const putDataEducation = {
        set successData(response) {
            var content = {};

            content.title = 'Success';
			content.message = response.message;
            content.icon = 'fa fa-check';

			$.notify(content,{
				type: 'success',
				placement: {
					from: 'top',
					align: 'right'
				},
				time: 1000,
                delay: 5000,
			});
            getEducations()
            $('#formUpdateEducation')[0].reset()
            $('#updateEduModal').modal('hide')
            $('#update_school').removeClass('is-valid')
            $('#update_major').removeClass('is-valid')
            $('#update_graduated').removeClass('is-valid')
            $('#update_year_in').removeClass('is-valid')
            $('#update_year_out').removeClass('is-valid')
            $('#update_score').removeClass('is-valid')
            $('#update_address').removeClass('is-valid')
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

function getDetailForUpdate() {  
    $('#dataTables').on('click', 'tbody tr td div .update', function(e) {
        const id = $(this).data('id')
        getDetailUpdate.loadData = id
    })

    const getDetailUpdate = {
        set loadData(data) {
            const urlDetail = URL_DATA + "/education/" + data
            Functions.prototype.requestDetail(getDetailUpdate, urlDetail)
        },
        set successData(response) {
            $('#id').val(response.id)
            $('#update_school').val(response.school)
            $('#update_major').val(response.major)
            $('#update_graduated option[value=' + response.graduated + ']').prop('selected', true)
            if ($('#update_graduated').val() == 'no') {
                $('#update_year_out').attr('disabled', 'disabled')
                $('#update_score').attr('disabled', 'disabled')
                $('#update_graduated').change(function() {
                    if ($('#update_graduated').val() === 'no') {
                        $('#update_year_out').attr('disabled', 'disabled')
                        $('#update_score').attr('disabled', 'disabled')
                    } else {
                        $('#update_year_out').removeAttr('disabled', 'disabled')
                        $('#update_score').removeAttr('disabled', 'disabled')
                    }
                })
            } else {
                $('#update_year_out').removeAttr('disabled', 'disabled')
                $('#update_score').removeAttr('disabled', 'disabled')
                $('#update_graduated').change(function() {
                    if ($('#update_graduated').val() === 'no') {
                        $('#update_year_out').attr('disabled', 'disabled')
                        $('#update_score').attr('disabled', 'disabled')
                    } else {
                        $('#update_year_out').removeAttr('disabled', 'disabled')
                        $('#update_score').removeAttr('disabled', 'disabled')
                    }
                })
            }
            $('#update_year_in').val(response.year_in)
            $('#update_year_out').val(response.year_out)
            $('#update_score').val(response.score)
            $('#update_address').val(response.address)
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

function deleteEducation() {
    $('#dataTables').on('click', 'tbody tr td div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/education/" + id
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
            getEducations()
        });
    })
}