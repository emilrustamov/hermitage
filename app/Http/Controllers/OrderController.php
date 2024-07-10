<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'total' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255'
        ]);

        $order = Order::create([
            'products' => json_encode($request->products),
            'total' => $request->total,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return response()->json(['message' => 'Order placed successfully', 'order' => $order], 201);
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }
}
