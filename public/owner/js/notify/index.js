$(document).ready(function () {
    getNotifications.loadData = '/notifications/' + user_id
})

// get all notify
const getNotifications = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getNotifications, URL);
    },
    set successData(response) {
        const container = document.getElementById('notif')
        
        const notif = response.data

        // badge length notif
        if (notif.length > 0) {
            document.getElementById('notifDropdown').innerHTML += `<span class="notification">${notif.length}</span>`
        }

        if (container) {
            container.innerHTML = '';
    
            for (i = notif.length-1; i >= 0; i--) {
                container.innerHTML += `
                <a href="${BASE_URL}/owner/tempat/${notif[i].place_id}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="notif-icon notif-success"> <i class="fa fa-check"></i> </div>
                        </div>
                        <div class="col-md-10">
                            <div class="notif-content">
                                <span class="block">
                                    ${notif[i].message}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                `;
            }
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