@extends('layouts.app')
@section('content')
    <div>
        <div class="mt-4 mb-3"><h3>{{ __('Должность: ') }} {{$post->name}}</h3></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('posts.edit', $post->id)}}"  class="btn btn-primary mb-3">{{ __('Изменить') }}</a>
    </div>
    @role('admin')
    <div class="p-2">
        <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
    @endrole
    
    <div class="p-2">
        <a href="{{route('posts.index')}}" class="btn btn-primary mb-3">{{ __('Вернуться назад') }}</a>
    </div>
    </div>
@endsection
