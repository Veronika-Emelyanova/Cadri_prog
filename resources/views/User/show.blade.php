@extends('layouts.app')
@section('content')
    <div>
        <div class="mt-4"><h3>Пользователь: {{$user->name}}</h3></div>
        <div class="mb-3"><h4>Должность: {{$user->post->name}}</h4></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('user.edit', $user->id)}}"  class="btn btn-primary mb-3">Изменить</a>
    </div>
        @if((Auth::user()->post_id) == 1)
    <div class="p-2">
        <form action="{{route('user.delete', $user->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
        @endif
    <div class="p-2">
        <a href="{{route('user.index')}}" class="btn btn-primary mb-3">Вернуться назад</a>
    </div>
    </div>
@endsection
