<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') ~ {{ config('app.name') }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fa.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/simditor/simditor.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    @yield('style')
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
        <i class="fas fa-globe"></i>
        {{ config('app.name') }}
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="合作方搜索">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}">登出</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul id="default" class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ activeIf(request()->is('/')) }}" href="{{ route('index') }}">
                            <i class="fas fa-tachometer-alt fa-fw"></i>&ensp;
                            控制面板
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ activeIf(request()->is('projects', 'projects/*') && !request()->has('settings')) }}"
                           href="{{ route('projects.index') }}">
                            <i class="fas fa-sitemap fa-fw"></i>&ensp;
                            我的项目
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>系统管理</span>
                    <a class="d-flex align-items-center text-muted" id="settings-extend" href="#">
                        <i class="far fa-minus-square"></i>
                    </a>
                </h6>
                <ul id="settings" class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link {{ activeIf(request()->is('users', 'users/*')) }}"
                           href="{{ route('users.index') }}">
                            <i class="fas fa-users fa-fw"></i>&ensp;
                            用户管理
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ activeIf(request()->is('projects', 'projects/*') && request()->has('settings')) }}"
                           href="{{ route('projects.index', ['settings']) }}">
                            <i class="fas fa-briefcase fa-fw"></i>&ensp;
                            项目管理
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main id="content" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            @include('layouts._messages')

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('title')</h1>
            </div>

            @yield('content')

        </main>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<script src="{{ asset('js/notify.js') }}"></script>
<script src="{{ asset('js/validate.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/projects.js') }}"></script>

@include('layouts._highlight')
<script src="{{ asset('js/simditor/module.min.js') }}"></script>
<script src="{{ asset('js/simditor/hotkeys.min.js') }}"></script>
<script src="{{ asset('js/simditor/uploader.min.js') }}"></script>
<script src="{{ asset('js/simditor/simditor.min.js') }}"></script>

@yield('script')
</body>
</html>