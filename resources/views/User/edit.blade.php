@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">{{ __('Пользователь') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="department" value="{{$user->name}}">
            </div>
            <div class="col-md-6">
                <label for="post">{{ __('Должность') }}</label>
                <select class="form-select mb-3" id="post" name="post_id" >
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="role">{{ __('Роль') }}</label>
                <select class="form-select mb-3" id="role" name="role_id" >
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="department_id">{{ __('Отдел(ы)') }}</label>
                <select class="form-select mb-3" id="department_id" name="department_id[]" multiple aria-label="multiple select example">
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">{{ __('Email-адрес') }}</label>

                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required autocomplete="email">

                    <!-- @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror -->
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="formFile">Фото</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
        </form>
    </div>
@endsection
