<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderEvidence;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('is_deleted', false)->orderBy('created_at', 'desc')->get();
        // Regresa orders.index view
        return view('orders.index', compact('orders')); 
    }

    public function create()
    {
        // Regresa orders.create view
        return view('orders.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required',
            'customer_name' => 'required',
            'customer_number' => 'required',
            'fiscal_data' => 'required',
            'delivery_address' => 'required',
            'notes' => 'nullable',
        ]);

        Order::create([
            'invoice_number' => $request->invoice_number,
            'customer_name' => $request->customer_name,
            'customer_number' => $request->customer_number,
            'fiscal_data' => $request->fiscal_data,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
            'status' => 'Ordered',
            'is_deleted' => false,
        ]);

        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $evidences = OrderEvidence::where('order_id', $order->id)->get();
        // Regresa orders.show view
        return view('orders.show', compact('order', 'evidences')); 
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        // Arreglar el orders index para vista
        return view('orders.index', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return back();
    }

    public function uploadEvidence(Request $request, $id)
    {
        $request->validate(['photo' => 'required|image|max:4096']);
        $path = $request->file('photo')->store('evidence', 'public');

        OrderEvidence::create([
            'order_id' => $id,
            'photo_path' => $path
        ]);

        return back();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->is_deleted = true;
        $order->save();

        return redirect()->route('orders.index');
    }
}