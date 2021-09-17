$(document).ready(function() {
    getTours.loadData = "/wisata"
    getHotels.loadData = "/hotel"
    getWorships.loadData = "/tempat-ibadah"
    getSouvenirs.loadData = "/souvenir"
}) 

const getTours = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getTours, URL);
    },
    set successData(response) {
        $("#total-tours").text(response.data.length)
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

const getHotels = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getHotels, URL);
    },
    set successData(response) {
        $("#total-hotels").text(response.data.length)
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

const getWorships = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getWorships, URL);
    },
    set successData(response) {
        $("#total-worships").text(response.data.length)
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

const getSouvenirs = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getSouvenirs, URL);
    },
    set successData(response) {
        $("#total-souvenirs").text(response.data.length)
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