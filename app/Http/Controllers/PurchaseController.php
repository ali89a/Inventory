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
            'model' => new Purchase(),
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
        //
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
