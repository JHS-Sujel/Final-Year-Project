<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StockController extends Controller
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

        $stocks = Stock::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/stocks", 'name' => "Stock"]
        ];

        return view('/stocks/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'stocks' => $stocks,
            'link' => route('stocks.create'),
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
            ['link' => "/admin/stocks", 'name' => "Stock"],
            ['link' => "", 'name' => "Create A New Stock"],
        ];

        $products = Product::where('status', 1)->get();

        return view('/stocks/create', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'products' => $products,
            'link' => route('stocks.index'),
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
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $stock = Stock::where('product_id', $request->product_id)->first();
        if (!$stock) {
            $stock = Stock::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'status' => 1
            ]);
            if ($stock) {
                return redirect()->route('stocks.index')->with('success', 'Stock info stored successfully');
            }
        }

        $stock->quantity += $request->quantity;
        if ($stock->save()) {
            return redirect()->route('stocks.index')->with('success', 'Stock info increased successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/stocks", 'name' => "Stock"],
            ['link' => "", 'name' => "Update Stock"],
        ];

        $products = Product::where('status', 1)->get();

        return view('/stocks/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'products' => $products,
            'stock' => $stock,
            'link' => route('stocks.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => "required",
            'quantity' => "required",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $quantity = $request->quantity - $stock->quantity;

        $stock->quantity += $quantity;
        $stock->product_id = $request->product_id;
        $stock->status = $request->status;
        if ($stock->save()) {
            return redirect()->route('stocks.index')->with('success', 'Stock info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
