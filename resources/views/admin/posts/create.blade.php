@extends('admin.layouts.main')

@section('title')
    Новый пост
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="text-danger">Пост не может быть без контента</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="preview_image">Превью поста</label>
                    <div class="input-group w-25">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                            <label class="custom-file-label" for="preview_image">Выберите изображение</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                    @error('preview_image')
                        <div class="text-danger">Файл необходимо выбрать</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="main_image">Изображение внутри поста</label>
                    <div class="input-group w-25">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="main_image" id="main_image">
                            <label class="custom-file-label" for="main_image">Выберите изображение</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                    @error('main_image')
                        <div class="text-danger">Файл необходимо выбрать</div>
                    @enderror
                </div>
                <div class="form-group  w-25">
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
                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;"
                        name="tags[]">
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
