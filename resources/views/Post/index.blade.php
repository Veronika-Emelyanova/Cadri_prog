@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">{{ __('#') }}</th>
                <th scope="col">{{ __('Должность') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>

                    <th>{{$post->id}}</th>
                    @role('admin', 'manager')
                    <td><a href="{{route('posts.show', $post->id)}}">{{$post->name}}</a></td>
                    @endrole

                    @role('user')
                        <td><b>{{$post->name}}</b></td>
                    @endrole

                </tr>
            @endforeach
            </tbody>
        </table>
        @role('admin', 'manager')
        <div><a href="{{route('posts.create')}}" class="btn btn-primary mt-3">{{ __('Добавить должность') }}</a></div>
        @endrole
    </div>
@endsection
