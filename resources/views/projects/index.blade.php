@extends('layouts.app')

@section('title', '我的项目')

@section('content')
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group mr-2" role="group">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-file-medical"></i>
                新建
            </button>
        </div>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-info">
                <i class="fas fa-file-import"></i>
                导入
            </button>
            <button type="button" class="btn btn-info">
                <i class="fas fa-file-export"></i>
                导出
            </button>
        </div>

        <form class="ml-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="请输入项目名称...">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-search"></i>
                        搜索
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-hover table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">名称</th>
            <th scope="col">地址</th>
            <th scope="col">状态</th>
            <th scope="col">创建于</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></td>
                <td>play.build-dragon.com</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection