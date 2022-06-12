@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">Фото</th>
                <th scope="col">Ф.И.О</th>
                <th scope="col">Должность</th>
                <th scope="col">Отдел(ы)</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>
                            <img src="{{ asset('images/' . $user->image)}}"
                                 width="50"
                                 height="50"
                                 alt=""
                                 class="rounded-circle border border-primary"
                            >
                        </th>
                        @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
                            <td><a href="{{route('user.show', $user->id)}}">{{$user->name}}</a></td>
                            @else
                            <td>{{$user->name}}</td>
                        @endif

                        <th>{{$user->post->name}}</th>
                        <div>
                            @if($user->otdels)
                                <th>
                            @foreach($user->otdels as $otdel)
                                    {{$otdel->id}}. {{$otdel->name}}<br>
                            @endforeach
                            </th>
                            @else
                                <th>Добавьте отдел(ы)</th>
                            @endif
                        </div>
                        <th>{{$user->email}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
        <div><a href="{{route('user.create')}}" class="btn btn-primary mt-3">Добавить пользователя</a></div>
        @endif
    </div>
@endsection
