$(document).ready(function () {
    // get data
    getVerifyCars()
    getUnverifiedCars()
})

function getVerifyCars() {
    const urlCar = URL_DATA +  "/verify-cars"
    const columns = [
        {data : 'no_car', name: 'no_car'},
        {data : 'name', name: 'name'},
        {data : 'rent_price', name: 'rent_price'},
        {data : 'passenger_capacity', name: 'passenger_capacity'},
        {data : 'fuel_capacity', name: 'fuel_capacity'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#notVerify", urlCar, columns)
}

function getUnverifiedCars() {
    const urlCar = URL_DATA +  "/unverified-cars"
    const columns = [
        {data : 'no_car', name: 'no_car'},
        {data : 'name', name: 'name'},
        {data : 'rent_price', name: 'rent_price'},
        {data : 'passenger_capacity', name: 'passenger_capacity'},
        {data : 'fuel_capacity', name: 'fuel_capacity'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#unverified", urlCar, columns)
}