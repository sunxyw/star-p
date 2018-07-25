@extends('layouts.app')

@section('title', '控制面板')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-paper-plane"></i>
                        总请求量
                    </h5>
                    <b>2395847</b> 次
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-sitemap"></i>
                        下属项目
                    </h5>
                    <b>3</b> 个
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-dollar-sign"></i>
                        账户余额
                    </h5>
                    <b>78.50</b> 元
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">名称</th>
                    <th scope="col">地址</th>
                    <th scope="col">状态</th>
                </tr>
                </thead>
                <tbody>
                @foreach((new App\Models\Project)->orderBy('created_at', 'desc')->limit(5)->get() as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></td>
                        <td>play.build-dragon.com</td>
                        <td>{{ $project->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="list-group">
                <li class="list-group-item list-group-item-light">最新消息</li>

                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">标题</h5>
                        <small>3天前</small>
                    </div>
                    <p class="mb-1">瞎鸡巴乱说的内容</p>
                </a>
            </div>
        </div>
    </div>

@endsection
