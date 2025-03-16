{{-- 共通画面（管理者） --}}
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>test release</title>
    <link rel="stylesheet" href="{{ asset('css/base/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Cream+Soda&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body class="page-wrapper">
    <header class="header-container">

        <h1 class="header-logo-container">
            <p class="header-logo">LOGO</p>
        </h1>

        <nav class="header-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="cav-link" href="{{ route('create') }}">登録画面</a>
                </li>
                <li class="nav-item">
                    <a class="cav-link" href="{{ route('list.show') }}">一覧画面</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main-container">
        @yield('content')
    </main>

    @yield('modal-content')

    @yield('scripts')
</body>

</html>
