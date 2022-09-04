@extends('admin.layouts.main')

@section('title')
    Редактирование тега "{{ $tag->title }}"
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.tag.update', $tag->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название тега</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                        value="{{ $tag->title }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Обновить">
                <a href="{{ route('admin.tag.show', $tag->id) }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
    </div>
@endsection
