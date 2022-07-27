@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('departments.update', $department->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Отдел') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="department" value="{{$department->name}}">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
        </form>
    </div>
@endsection
