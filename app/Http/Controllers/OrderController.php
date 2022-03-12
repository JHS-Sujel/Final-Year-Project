<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Stock;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $orders = Order::with(['user'])->orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/orders", 'name' => "Orders"]
        ];

        return view('/orders/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the a specific resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $order = Order::with(['items', 'items.product'])->find($id);
        $customer = User::with('shipping_address')->find($order->user_id);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/orders", 'name' => "Orders"],
            ['link' => "#", 'name' => "Order invoice"]
        ];

        return view('/orders/show', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'order' => $order,
            'customer' => $customer,
        ]);
    }


    /**
     * Show the form for updating a old resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $order = Order::with(['items', 'items.product'])->find($id);
        $customer = User::with('shipping_address')->find($order->user_id);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/orders", 'name' => "Orders"],
            ['link' => "#", 'name' => "Update order status"]
        ];

        return view('/orders/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'order' => $order,
            'customer' => $customer,
        ]);
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->status = 1;

        $items = OrderItem::where('order_id', $id)->get();

        foreach ($items as $item) {
            $stock = Stock::where('product_id', $item->product_id)->first();
            $stock->quantity -= $item->quantity;
            $stock->save();
        }


        if ($order->save()) {
            return redirect()->route('orders.edit', $id);
        }
    }

    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 3;

        $items = OrderItem::where('order_id', $id)->get();

        foreach ($items as $item) {
            $stock = Stock::where('product_id', $item->product_id)->first();
            $stock->quantity += $item->quantity;
            $stock->save();
        }

        if ($order->save()) {
            return redirect()->route('orders.edit', $id);
        }
    }
}
