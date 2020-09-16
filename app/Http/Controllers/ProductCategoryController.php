<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;
use App\Http\Resources\ProductCategoryResource;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
     private $view_root = 'admin/products/';

    public function index()
    {
        $view = view($this->view_root . 'index');
        $view->with('business_type_list', ProductCategory::all());
        return $view;

    }

    public function create()
    {
        $view = view($this->view_root . 'create');
        return $view;

    }
    public function store(Request $request)
    {
        $productCategory = ProductCategory::create($request->all());
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return new ProductCategoryResource($productCategory);
    }
}
