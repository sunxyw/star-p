$(function () {

    let invalid_h = function ($msg) {
        return '<div class="invalid-feedback">' + $msg + '</div>';
    };

    let valid_h = function ($msg = '填对了呢！棒棒哒~') {
        return '<div class="valid-feedback">' + $msg + '</div>';
    };

    let init_h = function ($invalid, $valid = '填对了呢！棒棒哒~') {
        return invalid_h($invalid) + valid_h($valid);
    };

    $("[required]").after(init_h('这里不能留空哟~')).keyup(function () {
        let value = $.trim($(this).val());

        if (value.length < 1) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });
});