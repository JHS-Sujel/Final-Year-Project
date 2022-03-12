<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductProfileController extends Controller
{
    // User Profile
    public function index(Request $request, $slug)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $product = Product::with(['brand', 'product_type'])->where('slug', $slug)->first();

        $breadcrumbs = [
            ['link' => "dashboard-analytics", 'name' => "Home"],
            ['link' => "dashboard-analytics", 'name' => "Products"],
            ['name' => "Profile"]
        ];
        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/product', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'product' => $product,
            'user' => $user,
        ]);
    }
}
