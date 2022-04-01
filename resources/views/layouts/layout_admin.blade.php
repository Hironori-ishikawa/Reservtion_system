<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reservation_system</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="my-navbar-admin">
        <a class="my-navbar-brand" href="{{ route('admin.auth.index')}}">オフィス来社・リモート予約システム</a>
        <div class="my-navbar-control">
            @if(Auth::check())
              <span class="my-navbar-item">ようこそ, 管理者の{{ Auth::admin()->name }}さん</span>
              ｜
              <a href="{{ route('logout') }}" id="logout" class="my-navbar-item">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            @else
              <a class="my-navbar-item" href="{{ route('admin.login') }}">ログイン</a>
              ｜
              <a class="my-navbar-item" href="{{ route('admin.register') }}">会員登録</a>
            @endif
        </div>
    </nav>
</header>



<main class="py-4">
    @yield('content')
</main>


</body>
</html>
