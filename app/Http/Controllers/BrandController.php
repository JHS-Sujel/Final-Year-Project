<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
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

        $brands = Brand::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/brands", 'name' => "Brands"]
        ];

        return view('/brands/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'brands' => $brands,
            'link' => route('brands.create'),
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
            ['link' => "/admin/brands", 'name' => "Brands"],
            ['link' => "", 'name' => "Create A New Brand"],
        ];

        return view('/brands/create', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'link' => route('brands.index'),
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
            'name' => 'required|unique:brands|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $brand = Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => 1
        ]);

        if ($brand) {
            return redirect()->route('brands.index')->with('success', 'Brand info stored successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/brands", 'name' => "Brands"],
            ['link' => "", 'name' => "Update Brand"],
        ];

        return view('/brands/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'brand' => $brand,
            'link' => route('brands.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:brands,id,$brand->id|max:255",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $brand = $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);

        if ($brand) {
            return redirect()->route('brands.index')->with('success', 'Brand info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
