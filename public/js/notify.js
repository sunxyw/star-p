if (!successi) {
    var successi = {
        class: "alert alert-success",
        icon: "fas fa-check"
    };
    var warningi = {
        class: "alert alert-warning",
        icon: "fas fa-exclamation"
    };
    var infoi = {
        class: "alert alert-info",
        icon: "fas fa-info"
    };
    var dangeri = {
        class: "alert alert-danger",
        icon: "fas fa-times"
    };

    function notify($class, $icon, $msg, $id) {
        return '<div style="display: none" id="notify' + $id + '" class="' + $class + '" role="alert">\n' +
            '            <i class="' + $icon + '"></i>\n' + $msg +
            '            <button type="button" class="close" data-dismiss="alert">\n' +
            '                <i class="fas fa-times"></i>\n' +
            '            </button>\n' +
            '        </div>';
    }

    function success($msg) {
        var id = new Date().getTime();
        $("#message").append(notify(successi.class, successi.icon, $msg, id));

        $("#notify" + id).slideDown();

        setTimeout(function () {
            $("#notify" + id).slideUp();
        }, 4000);
    }

    function info($msg) {
        var id = new Date().getTime();
        $("#message").append(notify(infoi.class, infoi.icon, $msg));

        $("#notify" + id).slideDown();

        setTimeout(function () {
            $("#notify" + id).slideUp();
        }, 4000);
    }

    function warning($msg) {
        var id = new Date().getTime();
        $("#message").append(notify(warningi.class, warningi.icon, $msg));

        $("#notify" + id).slideDown();

        setTimeout(function () {
            $("#notify" + id).slideUp();
        }, 4000);
    }

    function danger($msg) {
        var id = new Date().getTime();
        $("#message").append(notify(dangeri.class, dangeri.icon, $msg));

        $("#notify" + id).slideDown();

        setTimeout(function () {
            $("#notify" + id).slideUp();
        }, 4000);
    }
}