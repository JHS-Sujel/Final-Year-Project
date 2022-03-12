<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        Cart::session($userId);
        $items = Cart::getContent();
        $total = Cart::getTotal();
        $order = Order::create([
            'user_id' => $userId,
            'price' => $total,
            'discount' => 0,
            'vat' => 0,
            'paid' => $total,
            'status' => 0
        ]);

        foreach ($items as $row) {
            $order->items()->create([
                'product_id' => $row->associatedModel->id,
                'quantity' => $row->quantity,
                'price' => $row->price,
            ]);
        }

        Cart::session($userId)->clear();
        return response()->json($order);
    }
}
