<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ArchivedOrderController extends Controller
{
    // Mostrar archived orders
    public function index()
    {
        $orders = Order::where('is_deleted', true)->orderBy('created_at', 'desc')->get();
        // Regresa orders.archive view
        return view('orders.archive', compact('orders'));
    }

    // Para regresar un order
    public function restore($id)
    {
        $order = Order::findOrFail($id);
        $order->is_deleted = false;
        $order->save();

        return redirect()->route('archived-orders.index');
    }
}