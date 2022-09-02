@extends('admin.layouts.main')

@section('title')
    Редактирование категории "{{ $category->title }}"
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.category.update', $category->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                        value="{{ $category->title }}">
                    @error('title')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Обновить">
                <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
    </div>
@endsection
