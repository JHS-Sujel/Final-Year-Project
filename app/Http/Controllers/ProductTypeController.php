<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductTypeController extends Controller
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

        $product_types = ProductType::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/product-types", 'name' => "Product Types"]
        ];

        return view('/product-types/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'product_types' => $product_types,
            'link' => route('product-types.create'),
            'link_icon' => 'feather icon-plus-circle'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/product-types", 'name' => "Product Types"],
            ['link' => "", 'name' => "Create A New Product Type"],
        ];

        return view('/product-types/create', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'link' => route('product-types.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:product_types|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product_type = ProductType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => 1
        ]);

        if ($product_type) {
            return redirect()->route('product-types.index')->with('success', 'Product type info stored successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/product-types", 'name' => "Product Types"],
            ['link' => "", 'name' => "Update Product Type"],
        ];

        return view('/product-types/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'product_type' => $productType,
            'link' => route('product-types.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:product_types,id,$productType->id|max:255",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product_type = $productType->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);

        if ($product_type) {
            return redirect()->route('product-types.index')->with('success', 'Product type info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        //
    }
}
