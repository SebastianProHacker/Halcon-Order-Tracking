{{-- resources/views/users/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nombre completo:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Correo electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Rol:</label> {{-- Cambiar por Departamento si aplica --}}
            <select name="role_id" class="form-control" required> {{-- Ajustar nombre del campo --}}
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="activeCheck" checked>
            <label class="form-check-label" for="activeCheck">Usuario activo</label>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection