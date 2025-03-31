{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consulta de pedidos</h1>
    <form action="{{ route('orders.search') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="invoice_number" class="form-control" placeholder="Número de factura">
            </div>
            <div class="col-md-4">
                <input type="text" name="customer_number" class="form-control" placeholder="Número de cliente">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    @isset($order)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Estado: {{ $order->status }}</h3>
                
                @if($order->status == 'Delivered' && $order->photo_delivery)
                    <div class="mt-3">
                        <h5>Evidencia de entrega:</h5>
                        <img src="{{ asset('storage/'.$order->photo_delivery) }}" class="img-fluid" alt="Evidencia">
                    </div>
                @endif
                
                @if($order->status == 'In Process')
                    <div class="mt-3">
                        <p class="mb-1"><strong>Proceso:</strong> {{ $order->process_name }}</p>
                        <p class="mb-0"><strong>Fecha:</strong> {{ $order->process_date->format('d/m/Y H:i') }}</p>
                    </div>
                @endif
            </div>
        </div>
    @endisset
</div>
@endsection
