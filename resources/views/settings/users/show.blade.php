@extends('layouts.app')

@section('title', '用户详情')

@section("content")
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row" id="u-info">
                        <div class="col-md-4">
                            <figure class="figure">
                                <img id="image-f" src="{{ gravatar($user->email) }}"
                                     class="figure-img img-fluid rounded" width="120" height="120">
                                <figcaption class="figure-caption">
                                    头像由 <a href="https://cn.gravatar.com/">Gravatar</a> 提供
                                </figcaption>
                            </figure>
                        </div>

                        <div class="col-md-8">
                            <ul class="list-group list-group-flush">
                                {{--@switch($project->status)
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
                                @endswitch--}}
                                <li class="list-group-item">
                                    <h4>{{ $user->name }}</h4>
                                    <a href="mailto:{{ $user->email }}" class="small">
                                        {{ $user->email }}
                                    </a>
                                </li>
                                <li class="list-group-item text-right text-muted">
                                    注册于 {{ $user->created_at->diffForHumans() }}</li>
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
                            <button id="change-group" type="button" class="btn btn-info">
                                <i class="fas fa-user-tag"></i>
                                权限组
                            </button>
                        </div>

                        <div class="btn-group" role="group">
                            <button id="disabled" type="button" class="btn btn-danger">
                                <i class="fas fa-user-lock"></i>
                                封禁
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    编辑
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('users.update', $user) }}" method="POST"
                          onsubmit="return false;" accept-charset="utf-8">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">名称</span>
                            </div>
                            <input type="text" name="name" class="form-control" title="名称" value="{{ $user->name }}"
                                   required>
                        </div>

                        <button class="btn btn-success float-right mt-2" type="submit" id="submit">保存</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    下属项目
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($user->projects()->orderBy('created_at', 'desc')->limit('10')->get() as $project)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <form id="destroy-form">
        @csrf
        @method('DELETE')
    </form>

    <script>
        $(function () {
            $("#disabled").click(function () {
                swal({
                    title: "确认封禁 {{ $user->name }}？",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        @if($user->id == Auth::id())
                        swal("你不能封禁自己", {
                            icon: "error",
                        });
                        @else
                        $.ajax({
                            url: "{{ route('users.destroy', $user) }}",
                            type: 'POST',
                            cache: false,
                            data: new FormData($('#destroy-form')[0]),
                            processData: false,
                            contentType: false,
                            success: function () {
                                swal("已封禁 {{ $user->name }}", {
                                    icon: "success",
                                });
                                location.href = "{{ route('users.index') }}";
                            }
                        });
                        @endif
                    }

                });
            });

            $("#submit").click(function () {
                $.ajax({
                    url: "{{ route('users.update', $user) }}",
                    type: 'POST',
                    cache: false,
                    data: new FormData($('#edit-form')[0]),
                    processData: false,
                    contentType: false,
                    success: function () {
                        success("数据已保存");
                        $.pjax.reload("#u-info");
                    }
                });

                return false;
            });
        });
    </script>
@endsection