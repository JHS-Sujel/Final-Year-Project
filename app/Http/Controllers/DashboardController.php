<?php

namespace App\Http\Controllers;

use App\Message;
use App\Order;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard - Analytics
    public function dashboardAnalytics()
    {
        $pageConfigs = [
            'pageHeader' => false
        ];

        $products = Product::get()->count();
        $orders = Order::get()->count();
        $messages = Message::where('status', 0)->get()->count();
        $categories = ProductType::get()->count();

        return view('/pages/dashboard-analytics', [
            'pageConfigs' => $pageConfigs,
            'products' => $products,
            'orders' => $orders,
            'messages' => $messages,
            'categories' => $categories,
        ]);
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce()
    {
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/dashboard-ecommerce', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
