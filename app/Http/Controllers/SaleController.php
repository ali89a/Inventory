<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;use App\Model\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.sale.{$suffix}";
    }
    public function index()
    {
        $data = [
            'sales' => Sale::all(),
        ];

        return view($this->path('index'), $data);

    }

    public function create()
    {
        $data = [
            'model' => new Sale(), 'categories' => ProductCategory::pluck('name', 'id'),
        ];

        return view($this->path('create'), $data);

    }

    public function store(Request $request)
    {

        $request->validate([
            'products' => 'array',
            'description' => 'nullable',
        ]);
        \DB::beginTransaction();

// dd( $request->all());

        $sale = new Sale();
        $sale->invoice_number = \App\Classes\SaleNumber::serial_number();

        $sale->subtotal = $request->subtotal;
        $sale->discount = $request->discount;
        $sale->grandtotal = $request->grandtotal;
        $sale->receive_amount = $request->receive_amount;
        $sale->change_amount = $request->change_amount;
        $sale->date = Carbon::now()->format('Y-m-d');
        $sale->remark = $request->remark;
        $sale->creator_user_id = \Auth::id();
        $sale->save();
        $products = $request->get('products');

        foreach ($products as $row) {
            $sale->items()->create($row);
        }
        foreach ($products as $row) {
            $sale->stock_out_items()->create($row);
        }
        \DB::commit();

        \Toastr::success('Sale Order Successful!.', '', ["progressbar" => true]);
        return back();
    }

    public function show(Sale $sale)
    {
        //
    }

    public function edit(Sale $sale)
    {
        //
    }

    public function update(Request $request, Sale $sale)
    {
        //
    }

    public function destroy(Sale $sale)
    {
        //
    }
}
