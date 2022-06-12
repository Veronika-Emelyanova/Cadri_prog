@extends('layouts.app')
@section('content')
    <div>
        <div class="mb-3 mt-4"><h3>Отдел: {{$otdel->name}}</h3></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('otdel.edit', $otdel->id)}}"  class="btn btn-primary mb-3">Изменить</a>
    </div>
        @if((Auth::user()->post_id) == 1)
    <div class="p-2">
        <form action="{{route('otdel.delete', $otdel->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
        @endif
    <div class="p-2">
        <a href="{{route('otdel.index')}}" class="btn btn-primary mb-3">Вернуться назад</a>
    </div>
    </div>
@endsection
