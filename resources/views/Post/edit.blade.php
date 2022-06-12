@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Должность</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$post->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
