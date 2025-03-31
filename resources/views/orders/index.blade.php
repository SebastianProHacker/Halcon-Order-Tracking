{{-- resources/views/orders/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Pedidos</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Nuevo Pedido</a>
    <a href="{{ route('orders.archive') }}" class="btn btn-secondary mb-3">Ver Archivados</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Factura</th> {{-- Cambiar según nombre de campo --}}
                <th>Cliente</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders->sortByDesc('created_at') as $order)
            <tr>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->customer->company_name }}</td> {{-- Ajustar relación --}}
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Archivar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection