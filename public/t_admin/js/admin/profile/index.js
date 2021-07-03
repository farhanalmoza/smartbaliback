$(document).ready(function () {
    getProfile.loadData = email;
    updatePicture();
    updateProfile();
});

const getProfile = {
    set loadData(data) {
        const URL = URL_DATA + "/profile/" + data;
        Functions.prototype.requestDetail(getProfile, URL);
    },
    set successData(response) {
        $("#id").val(response.id);
        response.picture
            ? $("#prevPict").attr("src", ASSET + "/" + response.picture)
            : $("#prevPict").attr(
                  "src",
                  "https://demo.getstisla.com/assets/img/avatar/avatar-1.png"
              );
        $("#email").text(response.email);
        $("#name").val(response.name);
        $("#profession").val(response.profession);
        $("#about_me").val(response.about_me);
        $("#phone_1").val(response.phone_1);
        $("#phone_2").val(response.phone_2);
        $("#address").val(response.address);
        $("#location").val(response.location);
        $("#website").val(response.zip_code);
        $("#website").val(response.website);

        // template
        const profession = response.profession ? response.profession : "";
        $("#name-sidebar")
            .text(response.name)
            .append('<span class="user-level">' + profession + "</span>");
        $("#name-topbar").text(response.name);
        $("#email-topbar").text(response.email);
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
};

function updatePicture() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData();
            const file = $(this)[0].files;
            Functions.prototype.prevImage(file[0], $("#prevPict"));
            data.append("picture", file[0]);
            setTimeout(() => {
                const dataImg = $("#prevPict").attr("src");
                swal({
                    content: {
                        element: "img",
                        attributes: {
                            src: dataImg,
                            alt: "avatar",
                            className: "img-fluid img-thumbnail",
                        },
                    },
                    title: "Are you sure?",
                    text: "This image will be used as your avatar",
                    type: "warning",
                    buttons: {
                        confirm: {
                            text: "Yes, use it!",
                            className: "btn btn-primary",
                        },
                        cancel: {
                            visible: true,
                            className: "btn btn-danger",
                        },
                    },
                }).then((Delete) => {
                    if (Delete) {
                        const url = URL_DATA + "/update/change-pict/" + email;
                        Functions.prototype.uploadFile(url, data, "post");
                    } else {
                        $("#prevPict").attr(
                            "src",
                            "https://demo.getstisla.com/assets/img/avatar/avatar-1.png"
                        );
                    }
                });
            }, 100);
        }
    });
}

function updateProfile() {
    $("#updateProfile").validate({
        rules: {
            name: {
                required: true,
            },
            phone_1: {
                number: true,
            },
            phone_2: {
                number: true,
            },
            zip_code: {
                number: true,
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function (form, e) {
            e.preventDefault();
            const url = URL_DATA + "/update/profile/" + $("#id").val();
            const data = {
                name: $("#name").val(),
                about_me: $("#about_me").val(),
                profession: $("#profession").val(),
                phone_1: $("#phone_1").val(),
                phone_2: $("#phone_2").val(),
                location: $("#location").val(),
                address: $("#address").val(),
                zip_code: $("#zip_code").val(),
                website: $("#website").val(),
            };
            Functions.prototype.putRequest(postProfile, url, data);
            getProfile.loadData = email;
        },
    });
}

const postProfile = {
    set successData(response) {
        var content = {};
        content.title = "Success";
        content.message = response.message;
        content.icon = "fa fa-check";
        $.notify(content, {
            type: "success",
            placement: {
                from: "top",
                align: "right",
            },
            time: 1000,
            delay: 5000,
        });
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
};
