@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Должность</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="отдел">
            </div>
            <button type="submit" class="btn btn-primary">Добавить отдел</button>
        </form>
    </div>
@endsection
