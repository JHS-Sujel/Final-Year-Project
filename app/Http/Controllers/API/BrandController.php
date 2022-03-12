<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::where('status', 1)->orderBy('name', 'ASC')->withCount(['products'])->get();
        return response()->json($brands);
    }
}
