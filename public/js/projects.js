$("[data-destory]").click(function () {
    event.preventDefault();
    var name = $("[data-project='" + $(this).data("destory") + "'] td:first a").text();
    var url = $(this).attr("href");
    swal({
        title: "确认删除 " + name + "？",
        text: "删除后，与此项目相关的数据均会删除",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                type: 'POST',
                cache: false,
                data: new FormData($('#destory-form')[0]),
                processData: false,
                contentType: false,
                success: function (data) {
                    swal("已删除 " + name, {
                        icon: "success",
                    });
                    $.pjax.reload("main");
                }
            });
        }

    });
});