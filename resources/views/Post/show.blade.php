@extends('layouts.app')
@section('content')
    <div>
        <div class="mt-4 mb-3"><h3>Должность: {{$post->name}}</h3></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('post.edit', $post->id)}}"  class="btn btn-primary mb-3">Изменить</a>
    </div>
        @if((Auth::user()->post_id) == 1)
    <div class="p-2">
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
        @endif
    <div class="p-2">
        <a href="{{route('post.index')}}" class="btn btn-primary mb-3">Вернуться назад</a>
    </div>
    </div>
@endsection
