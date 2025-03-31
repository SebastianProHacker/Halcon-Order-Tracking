<!-- resources/views/orders/index.blade.php -->
@foreach($orders as $order)
    <tr>
        <td>{{ $order->invoice_number }}</td>
        <!-- Reemplazar 'status' por el nombre real del campo de estado -->
        <td>{{ $order->status }}</td>
        @if(auth()->user()->role == 'route')
            <td>
                <form action="{{ route('orders.upload-photo', $order->id) }}" method="POST">
                    @csrf
                    <input type="file" name="delivery_photo">
                    <button type="submit">Subir foto</button>
                </form>
            </td>
        @endif
    </tr>
@endforeach

<!-- resources/views/orders/create.blade.php -->
<!-- (Reemplazar los nombres de campos según modelo real) -->
<select name="status" {{ auth()->user()->role != 'warehouse' ? 'disabled' : '' }}>
    @foreach(\App\Models\OrderStatus::all() as $status)
        <option value="{{ $status->id }}">{{ $status->name }}</option>
    @endforeach
</select>