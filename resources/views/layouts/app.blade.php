<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HelpDesk') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
        rel="stylesheet"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="app-login app-auth-pages">
        <nav class="transparent z-depth-0">
            <div class="nav-wrapper ">
                <a href="{{ url('/') }}" class="brand-logo text-primary ">HELP DESK</a>
                <ul id="nav-mobile" class="right">
                        <!-- Authentication Links -->
                @guest
                     <li class="menu-item">
                        <a class="text-primary active" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                            @if (Route::has('register'))
                                <li class="menu-item">
                                    <a class="text-primary" href="{{ route('register') }}">{{ __('SignUp') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="menu-item">
                        
                                    <a class="text-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>
