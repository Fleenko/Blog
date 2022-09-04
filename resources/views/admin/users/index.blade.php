@extends('admin.layouts.main')

@section('title')
    Пользователи
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary float-left"><i class="fas fa-plus"></i>
                Добавить</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Имя пользователя</th>
                        <th>E-mail</th>
                        <th>Роль</th>
                        <th style="width: 140px">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}.</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $roles[$user->role] }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info float-left mr-3"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success float-left mr-2"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if (!$users->count())
                        <tr>
                            <td colspan="3">Пользователей нет. Поскорее создай их!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="pagination-sm m-0 float-right">{{ $users->links() }}</div>
        </div>
    </div>
@endsection
