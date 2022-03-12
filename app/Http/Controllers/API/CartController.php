<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function userCart(Request $request)
    {
        Cart::session(Auth::id());
        $items = Cart::getContent();
        $cart_items = [];
        foreach ($items as $key => $row) {
            $row->id = $key;
            $row->associatedModel->brand = Brand::find($row->associatedModel->brand_id);
            $row->associatedModel->product_type = Brand::find($row->associatedModel->product_type_id);
            $cart_items[] = $row;
        }
        return response()->json($cart_items);
    }


    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);

        Cart::session(Auth::id());

        $has_item = false;
        $item = null;
        $cart = null;
        $items = Cart::getContent();

        foreach ($items as $key => $row) {
            if($row->associatedModel->id == $product->id) {
                $has_item = true;
                $item = $row;
                break;
            }
        }

        if ($has_item) {
            Cart::update($item->id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $item->quantity + $request->quantity
                ]
            ]);
        } else {
            $row_id = random_int(100, 999999);
            $cart = Cart::add([
                'id' => $row_id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'attributes' => [],
                'associatedModel' => $product
            ]);
        }

        return response()->json($cart);
    }


    public function updateCart(Request $request)
    {
        $userId = auth()->user()->id;
        $result = Cart::session($userId)
            ->update($request->id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ]
            ]);
        return response()->json($result);
    }

    public function removeFromCart(Request $request)
    {
        $userId = auth()->user()->id;
        $result = Cart::session($userId)
            ->remove($request->id);
        return response()->json($result);
    }
}
