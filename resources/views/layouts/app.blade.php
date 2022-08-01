<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Cadr') }}</title>--}}
    <title>Система учёта кадров</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
   img {
    border: none; /* Убираем рамку */
   }
  </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @guest
                    @if (Route::has('login'))
                        <div>{{ __('Cadr') }}</div>
                    @endif
                @else
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('departments.index')}}"><h4>{{ __('Отделы') }}</h4></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('users.index')}}"><h4>{{ __('Пользователи') }}</h4></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('posts.index')}}" tabindex="-1"><h4>{{ __('Должности') }}</h4></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                @endguest


                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-flex flex-row">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <img src="{{ asset('images/' . Auth::user()->image)}}"
                                     width="50"
                                     height="50"
                                     
                                     alt=""
                                     class="rounded-circle"
                                >
                                <div>
                                </div>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4 w-75 p-3 m-lg-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
