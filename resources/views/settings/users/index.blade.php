@extends('layouts.app')

@section('title', '用户管理')

@section('content')
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group mr-2" role="group">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                新建
            </a>
        </div>

        <form class="ml-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="请输入昵称或邮箱...">
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
            <th scope="col">昵称</th>
            <th scope="col">邮箱</th>
            <th scope="col">下属项目</th>
            <th scope="col">注册时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->projects()->count() }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection