<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderEvidence;

class HomeController extends Controller
{
    public function index()
    {
        // Regresa home view
        return view('home');
    }

    // Buscar el order por invoice number
    public function searchOrder(Request $request)
    {
        $request->validate([
            'customer_number' => 'required',
            'invoice_number' => 'required'
        ]);

        $order = Order::where('customer_number', $request->customer_number)
                      ->where('invoice_number', $request->invoice_number)
                      ->where('is_deleted', false)
                      ->first();

        if (!$order) {
            return view('home')->with('error', 'Order not found.');
        }

        $evidences = $order->status === 'Delivered'
            ? OrderEvidence::where('order_id', $order->id)->get()
            : [];

        // Regresa orders.show view
        return view('orders.show', compact('order', 'evidences')); 
    }
}