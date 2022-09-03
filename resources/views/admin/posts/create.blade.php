@extends('admin.layouts.main')

@section('title')
    Новый пост
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.post.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название поста</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Содержание</label>
                    <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-danger">Это поле необходимо заполнить</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Категория</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Теги</label>
                    <select multiple="" class="form-control" name="tags[]">
                        @foreach ($tags as $tag)
                            <option {{ old('tags') != null && in_array($tag->id, old('tags')) ? 'selected' : '' }}
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="text-danger">Теги необходимо выбрать</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Добавить">
                <a href="{{ route('admin.post.index') }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
    </div>
@endsection
