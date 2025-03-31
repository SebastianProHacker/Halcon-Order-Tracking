<!-- resources/views/guest/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Consultar estado de pedido</h2>
    <form action="{{ route('orders.search') }}" method="GET">
        <div class="form-group">
            <label>Número de cliente:</label>
            <input type="text" name="customer_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Número de factura:</label>
            <input type="text" name="invoice_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
@endsection

<!-- resources/views/guest/order_status.blade.php -->
<!-- (Reemplazar 'Order' por su modelo real: Ej: 'Pedido', 'Order') -->
@if($order->status == 'Delivered')
    <div class="delivery-photo">
        <img src="{{ asset('storage/'.$order->photo_delivery) }}" alt="Evidencia de entrega">
    </div>
@endif