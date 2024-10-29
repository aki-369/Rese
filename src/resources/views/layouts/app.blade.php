<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="menu-container">
                <input type="checkbox" id="menu-toggle" class="menu-toggle">
                <label for="menu-toggle" class="menu-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>

                <div class="menu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        @if(Auth::check())
                            <li>    
                                <form action="/logout" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                            <li><a href="/mypage">Mypage</a></li>
                        @else
                             <li><a href="/register">Registration</a></li>
                            <li><a href="/login">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <a class="header__logo" href="/">
                Rese
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>