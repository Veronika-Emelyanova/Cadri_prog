@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Должность') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="должность">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Добавить новую должность') }}</button>
        </form>
    </div>
@endsection
