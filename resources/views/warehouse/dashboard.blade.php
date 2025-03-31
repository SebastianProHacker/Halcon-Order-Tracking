<!-- resources/views/warehouse/dashboard.blade.php -->
@foreach($orders->where('status', 'Ordered') as $order)
    <!-- Mostrar pedidos en estado "Ordenado" -->
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @method('PUT')
        <input type="hidden" name="status" value="In Process">
        <button type="submit">Marcar en proceso</button>
    </form>
@endforeach