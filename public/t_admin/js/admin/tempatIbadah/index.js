$(document).ready(function () {
    // get places
    getWorships.loadData = "/tempat-ibadah"
    
    // CRUD
})

const getWorships = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getWorships, URL);
    },
    set successData(response) {
        const container = document.getElementById('worship-cards');
        const worships = response.data;
        container.innerHTML = '';

        for (i = worships.length-1; i >= 0; i--) {
            container.innerHTML += `
            <div class="col-md-4">
                <div class="card card-post card-round">
                    <img class="card-img-top" src="${ASSET}/img/blogpost.jpg" alt="Card image cap">
                    <div class="card-body">
                        <div class="info-post ml-2">
                            <p class="username">${worships[i].title}</p>
                            <p class="date text-muted">${worships[i].address}</p>
                        </div>
                        <div class="separator-solid"></div>
                        <p class="card-text">${worships[i].desc}</p>
                        <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                        <div class="d-flex justify-content-end">
                            <a href="#">
                                <button type="button" class="btn btn-icon btn-link btn-primary">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            <a href="#">
                                <button type="button" class="btn btn-icon btn-link btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                        </div>
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