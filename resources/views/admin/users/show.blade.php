@extends('admin.layouts.main')

@section('title')
    Пользователь "{{ $user->name }}"
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success float-left mr-2"><i
                    class="fas fa-edit"></i></a>
            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
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
                        <th>Имя пользователя</th>
                        <th>E-mail</th>
                        <th>Роль</th>
                        <th>Создано</th>
                        <th>Обновлено</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $roles[$user->role] }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <a href="{{ route('admin.user.index') }}" class="btn btn-danger float-left">Назад</a>
        </div>
    </div>
@endsection
