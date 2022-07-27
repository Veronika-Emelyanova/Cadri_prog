@extends('layouts.app')
@section('content')
    <div>
        <div class="mb-3 mt-4"><h3>{{ __('Отдел: ') }} {{$department->name}}</h3></div>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2">
        <a href="{{route('departments.edit', $department->id)}}"  class="btn btn-primary mb-3">{{ __('Изменить') }}</a>
    </div>
    @role('admin')
    <div class="p-2">
        <form action="{{route('departments.destroy', $department->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-danger mb-3" >
        </form>
    </div>
    @endrole
    <div class="p-2">
        <a href="{{route('departments.index')}}" class="btn btn-primary mb-3">{{ __('Вернуться назад') }}</a>
    </div>
    </div>
@endsection
