<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductType;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
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

        $products = Product::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/products", 'name' => "Products"]
        ];

        return view('/products/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'products' => $products,
            'link' => route('products.create'),
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

        $product_types = ProductType::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/products", 'name' => "Products"],
            ['link' => "", 'name' => "Create A New Product"],
        ];

        return view('/products/create', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'product_types' => $product_types,
            'brands' => $brands,
            'link' => route('products.index'),
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
            'title' => 'required|unique:products|max:255',
            'sub_title' => 'required',
            'product_type_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'price' => $request->price,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'product_type_id' => $request->product_type_id,
            'brand_id' => $request->brand_id,
            'status' => 1
        ]);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            //filename to store
            $fileNameToStore = \time() . '.' . $extension;

            //Upload File
            FileUploadService::upload($request, $fileNameToStore);

            $product->image = $fileNameToStore;
            $product->save();
        }

        if ($product) {
            return redirect()->route('products.index')->with('success', 'Product info stored successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $product_types = ProductType::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/products", 'name' => "Products"],
            ['link' => "", 'name' => "Update Product"],
        ];

        return view('/products/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'product' => $product,
            'product_types' => $product_types,
            'brands' => $brands,
            'link' => route('products.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'title' => "required|unique:products,id,$product->id|max:255",
            'sub_title' => 'required',
            'product_type_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Product::where('id', $product->id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'price' => $request->price,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'product_type_id' => $request->product_type_id,
            'brand_id' => $request->brand_id,
            'status' => $request->status
        ], $product->id);

        if ($request->hasFile('image')) {

            if ($product->image !== 'default.png') {
                $originalImagePath = 'public/products/' . $product->image;
                $smallImagePath = 'public/products/thumbnail/small/' . $product->image;
                $mediumImagePath = 'public/products/thumbnail/medium/' . $product->image;

                Storage::delete($originalImagePath);
                Storage::delete($smallImagePath);
                Storage::delete($mediumImagePath);
            }

            $extension = $request->file('image')->extension();
            //filename to store
            $fileNameToStore = \time() . '.' . $extension;

            //Upload File
            FileUploadService::upload($request, $fileNameToStore);

            $product->image = $fileNameToStore;
            $product->save();
        }

        if ($product) {
            return redirect()->route('products.index')->with('success', 'Product info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function byCategories(Request $request)
    {
    }
}
