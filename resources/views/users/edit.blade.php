{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nombre completo:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label>Correo electrónico:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Rol:</label>
            <select name="role_id" class="form-control" required>
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="activeCheck" 
                {{ $user->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="activeCheck">Usuario activo</label>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection