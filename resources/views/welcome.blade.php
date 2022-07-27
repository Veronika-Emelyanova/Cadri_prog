<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Система учёта кадров</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
    </head>
    <body class="antialiased">
        <div  >
            @if (Route::has('login'))
            <h1 class="display-2" style="text-align: center; margin: 50px 0;"><b><i>{{ __('Система учёта кадров') }}</i></b></h1>
                <div class="gap-2 col-6 mx-auto align-baseline">
                    @auth
                        <div class="mt-4">
                            <a href="{{ url('/users') }}" class="btn btn-primary d-block p-2 bg-primary text-white" role="button"><h4>{{ __('Вернуться') }}</h4></a>
                        </div>
                    @else
                        <div class="mt-4">
                            <a href="{{ route('login') }}" class="btn btn-primary d-block p-2 bg-primary text-white" role="button"><h4>{{ __('Войти') }}</h4></a>
                        </div>

                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
