@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('otdel.update', $otdel->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Отдел</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="otdel" value="{{$otdel->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
