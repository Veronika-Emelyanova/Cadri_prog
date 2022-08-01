@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">{{ __('Фото') }}</th>
                <th scope="col">{{ __('Ф.И.О') }}</th>
                <th scope="col">{{ __('Должность') }}</th>
                <th scope="col">{{ __('Отдел(ы)') }}</th>
                <th scope="col">{{ __('Email') }}</th>
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

                        @role('admin', 'manager')
                            <td><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></td>
                        @endrole

                        @role('user')
                             <td><b>{{$user->name}}</b></td> 
                        @endrole
                        
                        <th>{{$user->post->name}}</th>

                        <div>
                            <th>
                            @foreach($user->departments as $department)
                                    {{$department->id}}. {{$department->name}}<br>
                            @endforeach
                            </th>  
                        </div>
                        <th>{{$user->email}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @role('admin', 'manager')
        <div><a href="{{route('users.create')}}" class="btn btn-primary mt-3">{{ __('Добавить пользователя') }}</a></div>
        @endrole
    </div>
@endsection
