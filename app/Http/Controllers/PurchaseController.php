<?php

namespace App\Http\Controllers;

use App\Model\Purchase;
use App\Model\ProductCategory;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
 protected function path(string $suffix)
    {
        return "admin.purchase.{$suffix}";
    }
    public function index()
    {
        $data = [
            'purchases' => Purchase::all(),
            
        ];

        return view($this->path('index'), $data);

    }

    public function create()
    {
        $data = [
            'model' => new Purchase(),  
            'categories' => ProductCategory::pluck('name', 'id'),
        ];

        return view($this->path('create'), $data);
    }

    

    public function store(Request $request)
    {
     $request->validate([
    'products' => 'array',
    'description' => 'nullable',
]);

// dd( $request->all());

$purchase = new Purchase();
$purchase->invoice_number="897";
$purchase->net_amount = "2500";
$purchase->grand_amount = "2500";
$purchase->remark = $request->description;
$purchase->creator_user_id = \Auth::id();
$purchase->save();
$products = $request->get('products');

foreach ($products as $row) {
    $purchase->items()->create($row);
}

\Toastr::success('Purchase Order Successful!.', '', ["progressbar" => true]);
return back();

    }
    public function show(Purchase $purchase)
    {
        //
    }
    public function edit(Purchase $purchase)
    {
        //
    }

    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    public function destroy(Purchase $purchase)
    {
        //
    }
}
