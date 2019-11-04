<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @isset($title)
    <title>{{ $title }}</title>
    @else
    <title>{{ config('app.name', 'HelpDesk')}}</title>
    @endisset
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Icon Font -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
        rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="transparent z-depth-0">
            <div class="nav-wrapper ">
                <a href="{{ url('/') }}" class="brand-logo text-primary ">HELP DESK</a>
                        <!-- Authentication -->
                @guest
                <ul id="nav-mobile" class="right  ">
                    <li class="menu-item ">
                        <a href="/login" class="text-primary {{strpos(url()->current(), 'login') ? 'active' : ''}}">LOGIN</a>
                    </li>
                    <li class="menu-item">
                        <a href="/signup" class="text-primary {{strpos(url()->current(), 'signup') ? 'active' : ''}}">SIGNUP</a>
                    </li>
                </ul>
                @endguest
                @auth
                <div class="nav-actions right">
                    <div class="user-profile ">
                        <div class="user-initials">hd</div>
                    </div>
                    <button class="btn btn-flat btn-logout">
                        <i class="zmdi zmdi-lock-outline"></i>&nbsp;Logout 
                    </button>
                </div>
                @endauth
            </div>
        </nav>

        <div class="row app-container">
            @yield('content')
        </div>
        <footer>
            <p class="center-align grey-text">&copy; 2019 TECHENFOLD</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
