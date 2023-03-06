<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    @yield('head')
</head>
<body class="bg-gray-400">

<nav class="pt-1">
    <div class="container">
        <ul class="d-flex justify-content-between list-unstyled">
            <li class="mx-2">
                <a class="btn btn-outline-{{ request()->is('loginView') ? 'primary' : 'secondary' }}"
                   href="{{url('loginView')}}">Login</a>
            </li>
            <li class="mx-2">
                <a class="btn btn-outline-{{ request()->is('registerView') ? 'primary' : 'secondary' }}"
                   href="{{url('registerView')}}">Register</a>
            </li>
            @auth
                <li class="mx-2">
                    <a class="btn btn-outline-primary"
                       href="{{url('/admin')}}">Admin</a>
                </li>
            @endauth

            <li class="ms-auto">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                @endauth
            </li>
        </ul>
    </div>

</nav>

@yield('content')
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
