<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // User Profile
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->verified == 0) {
            return redirect()->route('verify.index');
        }
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
        ];

        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/home', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }



    public function contactUs()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
        ];

        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/contact-us', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }

    public function aboutUs()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
        ];

        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/about-us', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }

    // User Profile
    public function byProductTypes(Request $request, $id)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $breadcrumbs = [
            ['link' => "/", 'name' => "Products"],
        ];

        $user = User::with('shipping_address')->find(Auth::id());

        return view('/frontend/products', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }
}
