<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $view_root = 'admin/products/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('business_type_list', Product::all());
        return $view;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
        ]);
        $business_type = new BusinessType;
        $business_type->fill($request->input());
        $business_type->company_id = Auth::user()->company()->id;
        $business_type->creator_user_id = Auth::id();
        $business_type->save();
        Session::put('alert-success', $business_type->name . ' created successfully');
        return redirect()->route('business-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $view = view($this->view_root . 'edit');
        $view->with('businessType', $businessType);
        return $view;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $businessType->fill($request->input());
        $businessType->update();
        Session::put('alert-success', $businessType->name . ' updated successfully');
        return redirect()->route('business-type.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return new ProductResource($product);
    }

    public function fetch_category_wise_product ($id)
    {

        $products = Product::where(['product_category_id' => $id])->get();

        $data = [

            'products' => $products,
        ];

        return $data;

    }
}
