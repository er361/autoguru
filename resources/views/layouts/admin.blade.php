<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">На главную</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li>
                        <p class="text-center bg-gray">{{'Я ' .  $user->name}} <br> Роль - <b>{{$user->role}}</b></p>
                    </li>
                    @if($user->isBuyer())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('orders.create')}}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Создать заказ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('orders.list')}}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Мои заказы
                            </a>
                        </li>
                    @endif
                    @if($user->isSeller())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('seller')}}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Поступившие заказы
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
