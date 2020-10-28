<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all(),
        ];

        return view('admin.print_labels.create', $data);

    }
     public function autocompleteSearch(Request $request)
    {

        $searchquery = '%' . $request->searchquery . '%';
        $productstocks = \App\Model\Product::where('name', 'like', $searchquery)
        ->orWhere('code', 'like', $searchquery)
            ->get();

       

        // $productstocks = DB::select("SELECT
        //             products.id,
        //             products.name,
        //             product_stocks.serial_number
        //         FROM `product_stocks`
        //         LEFT JOIN products ON products.id = product_stocks.product_id
        //         WHERE product_stocks.stock_status = 'in'
        //         AND ( products.name LIKE '$searchquery' OR product_stocks.serial_number LIKE '$searchquery')");

        // dd($productstocks);
        $response = array();
        foreach ($productstocks as $value) {
            $response[] = array("product_id" => $value->id, "product_name" => $value->name, "product_code" => $value->code,"product_category" => $value->product_category->name);
        }

        return $response;

    }

    public function fetch_product_info($id)
    {
        return \App\Model\Product::with('product_category')->Where('id', $id)->first();
    }
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
       $request->validate([
    'products' => 'required|array',
]);
//dd($request->all());
$data = [
    'product_name' => $request->product_name,
    'product_price' => $request->product_price,
    'page_size' => $request->page_size,
    'products' => $request->products,

];
 
return view('admin.print_labels.pdf', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
