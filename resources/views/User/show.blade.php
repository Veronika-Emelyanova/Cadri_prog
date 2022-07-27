@extends('layouts.app')
@section('content')
    <div>
        <div class="mt-4"><h3>Пользователь: {{$user->name}}</h3></div>
        <div class="mb-3"><h4>Должность: {{$user->post->name}}</h4></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('users.edit', $user->id)}}"  class="btn btn-primary mb-3">{{ __('Изменить') }}</a>
    </div>

    @role('admin')
    <div class="p-2">
        <form action="{{route('users.destroy', $user->id)}}" method="ostp">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
    @endrole  

    <div class="p-2">
        <a href="{{route('users.index')}}" class="btn btn-primary mb-3">{{ __('Вернуться назад') }}</a>
    </div>
    </div>
@endsection
