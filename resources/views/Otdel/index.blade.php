@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Отдел</th>
            </tr>
            </thead>
            <tbody>
            @foreach($otdels as $otdel)
                <tr>
                    <th>{{$otdel->id}}</th>
                    @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
                        <td><a href="{{route('otdel.show', $otdel->id)}}">{{$otdel->name}}</a></td>
                    @else
                        <td>{{$otdel->name}}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if((Auth::user()->post_id) == 1 || (Auth::user()->post_id) == 2)
        <div><a href="{{route('otdel.create')}}" class="btn btn-primary mt-3">Добавить отдел</a></div>
        @endif
    </div>
@endsection
