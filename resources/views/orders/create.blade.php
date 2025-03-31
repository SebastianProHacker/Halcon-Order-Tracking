{{-- resources/views/orders/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Pedido</h1>
    
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Número de Cliente:</label>
            <input type="text" name="customer_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <select name="status" class="form-control" required>
                @foreach(config('order.statuses') as $status)
                <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>

        {{-- Agregar más campos según modelo Order --}}
        
        <button type="submit" class="btn btn-primary">Guardar Pedido</button>
    </form>
</div>
@endsection