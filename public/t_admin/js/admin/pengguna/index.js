$(document).ready(function () {
    // get data
    getAllAdmin()
    getAllOwner()
})

function getAllAdmin() {
    const urlUser = URL_DATA +  "/all/admin"
    const columns = [
        {data : 'name', name: 'name'},
        {data : 'email', name: 'email'},
        {data : 'created_at', name: 'created_at'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#dataAdmin", urlUser, columns)
}

function getAllOwner() {
    const urlUser = URL_DATA +  "/all/owner"
    const columns = [
        {data : 'name', name: 'name'},
        {data : 'email', name: 'email'},
        {data : 'created_at', name: 'created_at'},
        {data : 'actions', name: 'actions', orderable: false, searchable: false},
    ]
    Functions.prototype.tableResult("#dataOwner", urlUser, columns)
}