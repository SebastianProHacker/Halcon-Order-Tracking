{{-- resources/views/users/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Nuevo Usuario</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th> {{-- Cambiar 'Rol' por 'Departamento' si aplica --}}
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td> {{-- Ajustar relación si usan department --}}
                <td>{{ $user->is_active ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection