@extends('admin.layouts.main')

@section('title')
    Посты
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.post.create') }}" class="btn btn-primary float-left"><i class="fas fa-plus"></i>
                Создать</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Название</th>
                        <th style="width: 40px">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}.</td>
                            <td>{{ $post->title }}</td>
                            <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}"
                                    class="btn btn-info float-left mr-3"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if (!$posts->count())
                    <tr>
                        <td colspan="3">Постов нет. Поскорее создай их!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="pagination-sm m-0 float-right">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection
