@extends('layouts.app')

@section('title', '项目详情')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row" id="p-info">
                        <div class="col-md-6">
                            <figure class="figure">
                                <img id="image-f" src="{{ $project->image_url }}"
                                     class="figure-img img-fluid rounded" width="400" height="300">
                                <figcaption class="figure-caption"
                                            id="image-name">{{ $project->image ?: 'http://iph.href.lu/400x300' }}</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                @switch($project->status)
                                    @case('uncommitted')
                                    <li class="badge badge-secondary">{{ $project->status_text }}</li>
                                    @break
                                    @case('pending')
                                    <li class="badge badge-info">{{ $project->status_text }}</li>
                                    @break
                                    @case('passed')
                                    <li class="badge badge-success">{{ $project->status_text }}</li>
                                    @break
                                    @case('denied')
                                    <li class="badge badge-danger">{{ $project->status_text }}</li>
                                    @break
                                    @default
                                    <li class="badge badge-secondary">未知状态</li>
                                @endswitch
                                <li class="list-group-item">
                                    <h4>{{ $project->name }}</h4>
                                </li>
                                <li class="list-group-item">
                                    <b>负责人：</b>{{ $project->user->name }}
                                </li>
                                <li class="list-group-item">{!! $project->info !!}</li>
                                <li class="list-group-item text-right text-muted">
                                    创建于 {{ $project->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    操作
                </div>
                <div class="card-body">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group mr-2" role="group">
                            <button type="button" class="btn btn-info">
                                <i class="fas fa-file-import"></i>
                                导入
                            </button>
                            <button type="button" class="btn btn-info">
                                <i class="fas fa-file-export"></i>
                                导出
                            </button>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-file-pdf"></i>
                                PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    编辑
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('projects.update', $project) }}" method="POST"
                          enctype="multipart/form-data" onsubmit="return false;">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">名称</span>
                            </div>
                            <input type="text" name="name" class="form-control" title="名称" value="{{ $project->name }}"
                                   required>
                        </div>

                        <textarea name="info" class="form-control" title="介绍" required>
                            {!! $project->info !!}
                        </textarea>

                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                            <label class="custom-file-label" for="image">
                                {{ str_replace('projects/images/', '', $project->image) }}
                            </label>
                        </div>

                        <button class="btn btn-success float-right mt-2" type="submit" id="submit">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $(":file").change(function () {
                var files = $(this).prop('files');//获取到文件列表

                if (files.length === 0) {
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onload = function (evt) {
                        $("#image-f").attr("src", evt.target.result);
                        $("#image-name").html(files[0].name);
                        $("[for='image']").html(files[0].name);
                    }
                }
            });

            $("#submit").click(function () {
                $.ajax({
                    url: "{{ route('projects.update', $project) }}",
                    type: 'POST',
                    cache: false,
                    data: new FormData($('#edit-form')[0]),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        success("数据已保存");
                        $.pjax.reload("#p-info");
                        hljs.initHighlightingOnLoad();
                    }
                });

                return false;
            });

            var editor = new Simditor({
                textarea: $("textarea"),
            });
        });
    </script>
@endsection