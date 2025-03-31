<!-- resources/views/layouts/app.blade.php -->
<!-- Agregar en la barra de navegación -->
@auth
    @if(auth()->user()->role == 'sales')
        <a href="{{ route('orders.create') }}">Nuevo Pedido</a>
    @endif
    <!-- Repetir para otros roles -->
@endauth