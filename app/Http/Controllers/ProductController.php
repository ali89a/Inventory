<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use Picqer;

class ProductController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.product.{$suffix}";
    }

    public function index()
    {
        $data = [
            'products' => Product::all(),
        ];
        return view($this->path('index'), $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_product($id)
    {

        return Product::with('unit_of_measurement')->findOrFail($id);

    }
    public function fetch_product_sale($id)
    {

        $product = Product::with('unit_of_measurement')->findOrFail($id);
        $data = [
            'product_name' => $product->name,
            'unit' => $product->unit_of_measurement->name,
            'sale_price' => $product->selling_price,
            'product_id' => $id,
            'stock' => \App\Classes\AvailableProductCalculation::product_id($id),
        ];
        return $data;

    }
    public function fetch_products_by_cat_id($id)
    {

        $products = Product::where(['product_status' => 'active', 'product_category_id' => $id])->get();

        $data = [

            'products' => $products,
        ];

        return $data;

    }
    public function create()
    {
        $data = [
            'model' => new Product,
            'categories' => \App\Model\ProductCategory::pluck('name', 'id'),
            'countries' => \App\Model\Country::pluck('name', 'id'),
            'units' => \App\Model\UnitOfMeasurement::pluck('name', 'id'),
        ];

        return view($this->path('create'), $data);

    }

    public function store(Request $request)
    {

        //   dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);
        $pro = new Product();

        $pro->product_category_id = $request->product_category_id;
        $pro->country_id = $request->country_id;
        $pro->unit_of_measurement_id = $request->unit_of_measurement_id;
        $pro->product_status = $request->status;
        $pro->name = $request->name;
        $pro->alert_quantity = $request->alert_quantity;
        $pro->selling_price = $request->selling_price;
        $pro->code = \App\Classes\ProductCode::serial_number();
        $pro->creator_user_id = \Auth::id();

        $label = \App\Classes\ProductCode::serial_number();

        $redColor = [0, 0, 0];
        $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $barcode = $barcode_generator->getBarcode($label, $barcode_generator::TYPE_CODE_128, 3, 50, $redColor);
        $path = storage_path("app/public/barcode/$label.png");
        file_put_contents($path, $barcode);
//Storage::disk('local')->put($path,  $barcode);

//   $path =$barcode->store('public/attach_documents');

        $pro->barcode_path = "barcode/$label.png";

        $pro->save();

        \Toastr::success('Product Created Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('product.index');

    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function edit(Product $product)
    {
        $view = view($this->view_root . 'edit');
        $view->with('businessType', $businessType);
        return $view;

    }

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

    public function fetch_category_wise_product($id)
    {

        $products = Product::where(['product_category_id' => $id])->get();

        $data = [

            'products' => $products,
        ];

        return $data;

    }
   
}
