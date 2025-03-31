<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ArchivedOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('is_deleted', true)->orderBy('created_at', 'desc')->get();
        return view('orders.archive', compact('orders')); // ✅ matches orders/archive.blade.php
    }

    public function restore($id)
    {
        $order = Order::findOrFail($id);
        $order->is_deleted = false;
        $order->save();

        return redirect()->route('archived-orders.index');
    }
}