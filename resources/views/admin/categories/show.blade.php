@extends('admin.layouts.main')

@section('title')
    Категория "{{ $category->title }}"
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info float-left mr-2"><i
                    class="fas fa-edit"></i></a>
            <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger float-left" type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
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
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <a href="{{ route('admin.category.index') }}" class="btn btn-danger float-left">Назад</a>
        </div>
    </div>
@endsection
