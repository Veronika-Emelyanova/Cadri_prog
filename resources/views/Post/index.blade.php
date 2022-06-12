@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Должность</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
                    <td><a href="{{route('post.show', $post->id)}}">{{$post->name}}</a></td>
                    @else
                    <td>{{$post->name}}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
        <div><a href="{{route('post.create')}}" class="btn btn-primary mt-3">Добавить должность</a></div>
        @endif
    </div>
@endsection
