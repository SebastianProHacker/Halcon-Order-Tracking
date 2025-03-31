{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel de Administración</h1>
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-block p-4">
                Gestión de Usuarios
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-success btn-block p-4">
                Gestión de Pedidos
            </a>
        </div>
    </div>
</div>
@endsection