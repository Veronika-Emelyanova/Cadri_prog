@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">{{ __('#') }}</th>
                <th scope="col">{{ __('Отдел') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <th>{{$department->id}}</th>
                    @role('admin', 'manager')
                        <td><a href="{{route('departments.show', $department->id)}}">{{$department->name}}</a></td>
                    @endrole

                    @role('user')
                        <td><b>{{$department->name}}</b></td>
                    @endrole
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        @role('admin', 'manager')
        <div><a href="{{route('departments.create')}}" class="btn btn-primary mt-3">{{ __('Добавить отдел') }}</a></div>
        @endrole
    </div>
@endsection
