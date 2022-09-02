@extends('admin.layouts.main')

@section('title')
    Теги
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.tag.create') }}" class="btn btn-primary float-left"><i class="fas fa-plus"></i>
                Добавить</a>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}.</td>
                            <td>{{ $tag->title }}</td>
                            <td class="text-center"><a href="{{ route('admin.tag.show', $tag->id) }}"
                                    class="btn btn-info float-left mr-3"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if (!$tags->count())
                    <tr>
                        <td colspan="3" style="text-center">Тегов нет. Поскорее создай их!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="pagination-sm m-0 float-right">{{ $tags->links() }}</div>
        </div>
    </div>
@endsection
