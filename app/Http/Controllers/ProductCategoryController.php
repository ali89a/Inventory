<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.category.{$suffix}";
    }

    public function index()
    {
        $data = [
            'categories' => ProductCategory::all(),
        ];
        return view($this->path('index'), $data);

    }

    public function create()
    {
        $data = [
            'model' => new ProductCategory,
        ];

        return view($this->path('create'), $data);

    }
    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required|unique:product_categories',
]);

ProductCategory::create($request->all());
\Toastr::success('Category Created Successfully!.', '', ["progressbar" => true]);
return redirect()->route('category.index');

    }


    public function show(\App\Model\ProductCategory $productCategory)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($productCategory)
    {
    //dd( $productCategory);
       $data = [
    'model' => ProductCategory::find($productCategory),
];

return view($this->path('edit'), $data);


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
        $productCategory=ProductCategory::find($request->id);
       $request->validate([
    'name' => 'required|unique:product_categories,name,' . $productCategory->id,
]);
//dd($request->all());
$productCategory->fill($request->all());
$productCategory->update();
\Toastr::success('Category Updated Successfully!.', '', ["progressbar" => true]);
return redirect()->route('category.index');


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
