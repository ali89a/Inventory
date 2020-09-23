<?php

namespace App\Http\Controllers;

use App\Model\Purchase;
use App\Model\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;


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

 //dd( $request->all());

$purchase = new Purchase();
$purchase->invoice_number= '4444';
$purchase->grand_total = $request->grand_total;
$purchase->date = Carbon::now()->format('Y-m-d'); 
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
