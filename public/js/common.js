$(function () {
    $(document).pjax("a[data-pjax!='no']", "body");

    $("#settings-extend").click(function () {
        $(this).children("i").toggleClass("fa-plus-square").toggleClass("fa-minus-square");
        $("#settings").find("li").each(function () {
            $(this).slideToggle();
        });
    });

    /*$.getJSON("js/navs.json", function (data) {
        $.each(data.default, function () {
            var html = '<li class="nav-item">\n' +
                '                        <a class="nav-link active" href="' + this.link + '">\n' +
                '                            <i class="' + this.icon + ' fa-fw"></i>&ensp;\n' +
                '                            ' + this.title + '\n' +
                '                        </a>\n' +
                '                    </li>';

            $("#default").append(html);
        });
    });*/

    $("html").ajaxError(function () {
        danger("系统错误：请刷新页面或联系技术处理");
    }).ajaxComplete(function () {
        $(".loading").each(function () {
            $(this).removeClass("loading")
                .html($(this).attr("data-loading-origin"));
        });
    });

    $("[type='submit']").click(function () {
        let origin = $(this).html();
        $(this).addClass("loading")
            .attr("data-loading-origin", origin)
            .html('<i class="fas fa-spin fa-spinner"></i> 加载中...');
    });
});