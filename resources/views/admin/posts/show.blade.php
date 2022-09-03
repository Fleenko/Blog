@extends('admin.layouts.main')

@section('title')
    Пост "{{ $post->title }}"
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-info float-left mr-2"><i
                    class="fas fa-edit"></i></a>
            <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger float-left" type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->content !!}</p>
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Название</th>
                        <th>Создано</th>
                        <th>Обновлено</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <a href="{{ route('admin.post.index') }}" class="btn btn-danger float-left">Назад</a>
        </div>
    </div>
@endsection
