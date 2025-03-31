{{-- resources/views/orders/archive.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos Archivados</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Factura</th>
                <th>Cliente</th>
                <th>Fecha Archivado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deletedOrders as $order)
            <tr>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->customer->company_name }}</td>
                <td>{{ $order->deleted_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('orders.restore', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-success">Restaurar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection