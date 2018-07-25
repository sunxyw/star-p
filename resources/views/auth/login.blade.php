<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>登录 ~ {{ config('app.name') }}</title>

    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fa.min.css') }}" rel="stylesheet">
</head>

<body class="text-center bg-dark text-light">
<form class="form-signin" action="{{ route('login') }}" method="POST" style="z-index:2">
    @csrf
    <div class="mb-4">
        <i class="fas fa-globe fa-6x"></i>
    </div>
    <h1 class="h3 mb-3 font-weight-normal">星域互联</h1>
    <label for="email" class="sr-only">邮箱</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="邮箱" required autofocus>
    <label for="password" class="sr-only">密码</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="密码" required>
    <small class="form-text text-danger">
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </small>
    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">登录</button>
    <p class="mt-5 mb-3 text-muted">星域互联 版权所有</p>
</form>

<div id="particles-js" style="position: absolute; width: 100%; z-index:1;"></div>

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.bootcss.com/particles.js/2.0.0/particles.min.js"></script>

<script>
    particlesJS.load('particles-js', 'js/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

</body>
</html>