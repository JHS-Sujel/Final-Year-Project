<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // User Profile
    public function index(Request $request)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
        ];
        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/checkout', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }
}
