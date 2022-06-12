@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Пользователь</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="otdel" value="{{$user->name}}">
            </div>
            <div class="col-md-6">
                <label for="post">Должность</label>
                <select class="form-select mb-3" id="post" name="post_id" >
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="otdel_id">Отдел(ы)</label>
                <select class="form-select mb-3" id="otdel_id" name="otdel_id[]" multiple aria-label="multiple select example">
                    @foreach($otdels as $otdel)
                        <option value="{{$otdel->id}}">{{$otdel->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">{{ __('Email-адрес') }}</label>

                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required autocomplete="email">

                    <!-- @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror -->
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="formFile">Фото</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
