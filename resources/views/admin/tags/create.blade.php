@extends('admin.layouts.main')

@section('title')
    Новый тег
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.tag.store') }}" method="post" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название тега</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Название">
                    @error('title')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Добавить">
                <a href="{{ route('admin.tag.index') }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
    </div>
@endsection
