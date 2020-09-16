<?php

namespace App\Http\Controllers;

use App\Model\ProductGroup;
use App\Http\Resources\ProductGroupResource;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductGroupResource::collection(ProductGroup::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productGroup = ProductGroup::create($request->all());
        return new ProductGroupResource($productGroup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $productGroup)
    {
        return new ProductGroupResource($productGroup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGroup $productGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGroup $productGroup)
    {
        $productGroup->update($request->all());
        return new ProductGroupResource($productGroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGroup $productGroup)
    {
        $productGroup->delete();
        return new ProductGroupResource($productGroup);
    }
}
