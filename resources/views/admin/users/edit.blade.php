@extends('admin.layouts.main')

@section('title')
    Редактирование пользователя "{{ $user->name }}"
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Имя пользователя" value="{{ $user->name }}">
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  w-25">
                    <label for="role">Роль</label>
                    <select class="form-control" name="role">
                        @foreach ($roles as $id => $role)
                            <option {{ $user->role == $id ? 'selected' : '' }} value="{{ $id }}">
                                {{ $role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" class="form-control" id="password" name="password" placeholder="******">
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Обновить">
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Назад</a>
            </div>
        </form>
    </div>
@endsection
