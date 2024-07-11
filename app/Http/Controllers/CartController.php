<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);
        $product = [
            'id' => $request->id,
            'title' => $request->title,
            'price' => $request->price,
            'image' => $request->image
        ];
        $cart[$request->id] = $product;
        Session::put('cart', $cart);

        return response()->json(['message' => 'Товар добавлен в корзину']);
    }

    public function items()
    {
        $cart = Session::get('cart', []);

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + $item['price'];
        }, 0);

        return response()->json(['cart' => $cart, 'total' => $total]);
    }
}
