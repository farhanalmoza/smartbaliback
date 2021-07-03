$(document).ready(function () {
    // get experience
    getWorks()
    getInternships()
    getVolunteers()
    getOrganitations()
    // CRUD
    addExp()
    updateWork()
    getDetailForUpdate()
    deleteWork()
})

function getWorks() {
    const urlWork = URL_DATA +  "/work/all/" + user_id
    const columns = [
        {data : 'org_name', name: 'org_name'},
        {data : 'position', name: 'position'},
        {data : 'jobdesc', name: 'jobdesc'},
        {data : 'year_in', name: 'year_in'},
        {data : 'year_out', name: 'year_out'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#tableWork", urlWork, columns)
}

function getInternships() {
    const urlWork = URL_DATA +  "/intern/all/" + user_id
    const columns = [
        {data : 'org_name', name: 'org_name'},
        {data : 'position', name: 'position'},
        {data : 'jobdesc', name: 'jobdesc'},
        {data : 'year_in', name: 'year_in'},
        {data : 'year_out', name: 'year_out'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#tableIntern", urlWork, columns)
}

function getVolunteers() {
    const urlWork = URL_DATA +  "/volun/all/" + user_id
    const columns = [
        {data : 'org_name', name: 'org_name'},
        {data : 'position', name: 'position'},
        {data : 'jobdesc', name: 'jobdesc'},
        {data : 'year_in', name: 'year_in'},
        {data : 'year_out', name: 'year_out'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#tableVolun", urlWork, columns)
}

function getOrganitations() {
    const urlWork = URL_DATA +  "/org/all/" + user_id
    const columns = [
        {data : 'org_name', name: 'org_name'},
        {data : 'position', name: 'position'},
        {data : 'jobdesc', name: 'jobdesc'},
        {data : 'year_in', name: 'year_in'},
        {data : 'year_out', name: 'year_out'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#tableOrg", urlWork, columns)
}

function addExp() {
    $('#formAddExp').validate({
        rules: {
            org_name: {
                required: true
            },
            position: {
                required: true
            },
            jobdesc: {
                required: true
            },
            year_in: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            year_out: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
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
            const data = {
                user_id: user_id,
                org_name: $('#org_name').val(),
                position: $('#position').val(),
                jobdesc: $('#jobdesc').val(),
                year_in: $('#year_in').val(),
                year_out: $('#year_out').val(),
            }
            Functions.prototype.postRequest(postExp, URL_ADD, data)
        }
    })

    const postExp = {
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
                getWorks()
                getInternships()
                getVolunteers()
                getOrganitations()
                $('#formAddExp')[0].reset()
                $('#addExpModal').modal('hide')
                $('#org_name').removeClass('is-valid')
                $('#position').removeClass('is-valid')
                $('#jobdesc').removeClass('is-valid')
                $('#year_in').removeClass('is-valid')
                $('#year_out').removeClass('is-valid')
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

function updateWork() {
    $('#formUpdateExp').validate({
        rules: {
            update_org_name: {
                required: true
            },
            update_position: {
                required: true
            },
            update_jobdesc: {
                required: true
            },
            update_year_in: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
            },
            update_year_out: {
                required: true,
                number: true,
                minlength: 4,
                maxlength: 4,
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
            const urlPost = URL_DATA + "/update/work/" + $('#id').val()
            const data = {
                org_name: $('#update_org_name').val(),
                position: $('#update_position').val(),
                jobdesc: $('#update_jobdesc').val(),
                year_in: $('#update_year_in').val(),
                year_out: $('#update_year_out').val(),
            }
            Functions.prototype.putRequest(putDataWork, urlPost, data)
        }
    })
    const putDataWork = {
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
            getWorks()
            getInternships()
            getVolunteers()
            getOrganitations()
            $('#formUpdateExp')[0].reset()
            $('#updateExpModal').modal('hide')
            $('#update_org_name').removeClass('is-valid')
            $('#update_position').removeClass('is-valid')
            $('#update_jobdesc').removeClass('is-valid')
            $('#update_year_in').removeClass('is-valid')
            $('#update_year_out').removeClass('is-valid')
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
    $('.table').on('click', 'tbody tr td div .update', function(e) {
        const id = $(this).data('id')
        getDetailUpdate.loadData = id
    })

    const getDetailUpdate = {
        set loadData(data) {
            const urlDetail = URL_DATA + "/exp/" + data
            Functions.prototype.requestDetail(getDetailUpdate, urlDetail)
        },
        set successData(response) {
            $('#id').val(response.id)
            $('#update_org_name').val(response.org_name)
            $('#update_position').val(response.position)
            $('#update_jobdesc').val(response.jobdesc)
            $('#update_year_in').val(response.year_in)
            $('#update_year_out').val(response.year_out)
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

function deleteWork() {
    $('.table').on('click', 'tbody tr td div .delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/exp/" + id
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
            getWorks()
            getInternships()
            getVolunteers()
            getOrganitations()
        });
    })
}