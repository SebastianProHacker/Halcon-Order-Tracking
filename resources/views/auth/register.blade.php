@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Registrar Nuevo Usuario</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nombre Completo</label>
                    <input type="text" name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Rol</label>
                    <select name="role" class="form-select" required>
                        <option value="">Seleccionar Rol</option>
                        <option value="sales">Ventas</option>
                        <option value="purchasing">Compras</option>
                        <option value="warehouse">Almacén</option>
                        <option value="route">Ruta</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" 
                           class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" 
                           class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Registrar Usuario</button>
    </form>
</div>
@endsection