$(function () {
    console.log('load')
    $("[data-destroy]").click(function () {
        console.log('click')
        var name = $("[data-project='" + $(this).data("destroy") + "'] td:first a").text();
        var url = $(this).data("url");
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
                    data: new FormData($('#destroy-form')[0]),
                    processData: false,
                    contentType: false,
                    success: function () {
                        swal("已删除 " + name, {
                            icon: "success",
                        }).then(() => {location.reload();});
                    }
                });
            }

        });
    });
});
