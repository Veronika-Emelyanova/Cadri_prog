@extends('layouts.app')
@section('content')
    <div>
        <div class="mt-4"><h3>Пользователь: {{$user->name}}</h3></div>
        <div class="mb-3"><h4>Должность: {{$user->post->name}}</h4></div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('user.store_image') }}" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Добавьте изображение</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Добавить фото') }}
                </button>
            </div>
        </div>
        </form>
    </div>


@endsection
