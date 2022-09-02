@extends('admin.layouts.main')

@section('title')
    Категории
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary float-left"><i class="fas fa-plus"></i>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}.</td>
                            <td>{{ $category->title }}</td>
                            <td class="text-center"><a href="{{ route('admin.category.show', $category->id) }}"
                                    class="btn btn-info float-left mr-3"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="pagination-sm m-0 float-right">{{ $categories->links() }}</div>
        </div>
    </div>
@endsection
