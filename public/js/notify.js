let successi = {
    class: "alert alert-success",
    icon: "fas fa-check"
};
let warningi = {
    class: "alert alert-warning",
    icon: "fas fa-exclamation"
};
let infoi = {
    class: "alert alert-info",
    icon: "fas fa-info"
};
let dangeri = {
    class: "alert alert-danger",
    icon: "fas fa-times"
};

function notify($class, $icon, $msg, $id) {
    let html = '<div style="display: none" id="notify' + $id + '" class="' + $class + '" role="alert">\n' +
        '            <i class="' + $icon + '"></i>\n' + $msg +
        '            <button type="button" class="close" data-dismiss="alert">\n' +
        '                <i class="fas fa-times"></i>\n' +
        '            </button>\n' +
        '        </div>';

    return html;
}

function success($msg) {
    let id = new Date().getTime();
    $("#message").append(notify(successi.class, successi.icon, $msg, id));

    $("#notify" + id).slideDown();

    setTimeout(function () {
        $("#notify" + id).slideUp();
    }, 4000);
}

function info($msg) {
    let id = new Date().getTime();
    $("#message").append(notify(infoi.class, infoi.icon, $msg));

    $("#notify" + id).slideDown();

    setTimeout(function () {
        $("#notify" + id).slideUp();
    }, 4000);
}

function warning($msg) {
    let id = new Date().getTime();
    $("#message").append(notify(warningi.class, warningi.icon, $msg));

    $("#notify" + id).slideDown();

    setTimeout(function () {
        $("#notify" + id).slideUp();
    }, 4000);
}

function danger($msg) {
    let id = new Date().getTime();
    $("#message").append(notify(dangeri.class, dangeri.icon, $msg));

    $("#notify" + id).slideDown();

    setTimeout(function () {
        $("#notify" + id).slideUp();
    }, 4000);
}