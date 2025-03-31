{{-- resources/views/orders/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Pedido #{{ $order->invoice_number }}</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>Estado:</strong> {{ $order->status }}</p>
            <p><strong>Cliente:</strong> {{ $order->customer->company_name }}</p>
            <p><strong>Fecha creación:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

            @if(auth()->user()->role->name == 'Route' && in_array($order->status, ['In Route', 'Delivered']))
                <hr>
                <form action="{{ route('orders.upload-photo', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Subir evidencia fotográfica:</label>
                        <input type="file" name="delivery_photo" class="form-control-file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir Foto</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection