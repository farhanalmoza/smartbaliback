$(document).ready(function () {
    // experience
    getWork.loadData = user_id;
    getIntern.loadData = user_id;
    getVolun.loadData = user_id;
    getOrg.loadData = user_id;
    // profile
    getProfile.loadData = email;
    // social media
    getSocials.loadData = user_id;
    // education
    getEdu.loadData = user_id;
    // portfolio
    getPortfolio.loadData = user_id;
})

const getWork = {
    set loadData(data) {
        const URL = URL_DATA + "/work/all/" + data;
        Functions.prototype.getRequest(getWork, URL);
    },
    set successData(response) {
        const container = document.getElementById('count_work');
        const work = response.data;
        container.innerHTML = work.length
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

const getIntern = {
    set loadData(data) {
        const URL = URL_DATA + "/intern/all/" + data;
        Functions.prototype.getRequest(getIntern, URL);
    },
    set successData(response) {
        const container = document.getElementById('count_intern');
        const intern = response.data;
        container.innerHTML = intern.length
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

const getVolun = {
    set loadData(data) {
        const URL = URL_DATA + "/volun/all/" + data;
        Functions.prototype.getRequest(getVolun, URL);
    },
    set successData(response) {
        const container = document.getElementById('count_volun');
        const volun = response.data;
        container.innerHTML = volun.length
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

const getOrg = {
    set loadData(data) {
        const URL = URL_DATA + "/org/all/" + data;
        Functions.prototype.getRequest(getOrg, URL);
    },
    set successData(response) {
        const container = document.getElementById('count_org');
        const org = response.data;
        container.innerHTML = org.length
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

const getProfile = {
    set loadData(data) {
        const URL = URL_DATA + "/profile/" + data;
        Functions.prototype.requestDetail(getProfile, URL);
    },
    set successData(response) {
        $(".name").text(response.name);
        $(".email").text(response.email);
        $(".profession").text(response.profession);
        $("#about-me").text(response.about_me);
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
            <a class="btn btn-primary btn-twitter btn-sm btn-link" href="${social[i].link}"> 
                <span class="btn-label just-icon">${social[i].short_name} </span>
            </a>
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

const getEdu = {
    set loadData(data) {
        const URL = URL_DATA + "/education/all/" + data;
        Functions.prototype.getRequest(getEdu, URL);
    },
    set successData(response) {
        const container = document.getElementById('education');
        const educations = response.data;
        container.innerHTML = '';

        if (educations.length == 0) {
            container.innerHTML += `
            <div class="col-md-12">
                <div class="card-sub text-center">									
                    Please add your education!
                </div>
            </div>
            `
        }

        for (i = educations.length-1; i >= 0; i--) {
            container.innerHTML += `
            <li class="timeline-inverted">
                <div class="timeline-badge primary"><i class="fas fa-user-graduate"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                    <h4 class="timeline-title">${educations[0].school} | ${educations[0].year_in} - ${educations[0].year_out}</h4>
                    </div>
                    <div class="timeline-body">
                    <p>${educations[0].major}</p>
                    <p>GPA ${educations[0].score}</p>
                    </div>
                </div>
            </li>
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

const getPortfolio = {
    set loadData(data) {
        const URL = URL_DATA + "/portfolio/all/" + data;
        Functions.prototype.getRequest(getPortfolio, URL);
    },
    set successData(response) {
        const container = document.getElementById('portfolio-card');
        const portfolios = response.data;
        container.innerHTML = '';

        if (portfolios.length == 0) {
            container.innerHTML += `
            <div class="col-md-12">
                <div class="card-sub text-center">									
                    You have no project
                </div>
            </div>
            `
        }

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