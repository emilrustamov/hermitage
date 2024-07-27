<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'products' => 'required|json',
            'total' => 'required|numeric'
        ]);

        try {
            $order = Order::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'products' => $request->products,
                'total' => $request->total
            ]);

            return response()->json(['message' => 'Order placed successfully', 'order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Order placement failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}
