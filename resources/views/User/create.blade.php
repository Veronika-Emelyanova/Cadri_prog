@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Регистрация') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Имя(Ф.И.О)') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email-адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="post_id" class="col-md-4 col-form-label text-md-end">{{ __('Должность') }}</label>

                                <div class="col-md-6">
{{--                                    <input id="post" type="text" class="form-control @error('post') is-invalid @enderror" name="post_id" value="{{ old('post_id') }}" required autocomplete="post_id" autofocus>--}}
                                    <select class="form-control @error('post') is-invalid @enderror" id="post_id" name="post_id" value="{{ old('post_id') }}" required autocomplete="post_id" autofocus>
                                        @foreach($posts as $post)
                                            <option value="{{$post->id}}">{{$post->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="otdel_id" class="col-md-4 col-form-label text-md-end">{{ __('Отдел(ы)') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('otdel') is-invalid @enderror" id="otdel_id" name="otdel_id[]" value="{{ old('otdel_id[]') }}" multiple aria-label="multiple select example">
                                        @foreach($otdels as $otdel)
                                            <option value="{{$otdel->id}}">{{$otdel->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('otdel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFile" class="col-md-4 col-form-label text-md-end">Фото</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror" type="file" id="formFile" name="image">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
{{--                            <div class="row mb-3">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Добавить нового пользовтеля') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

