<?php

namespace App\Http\Controllers;

use App\Model\Sale;
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
            'model' => new Sale(),
        ];

        return view($this->path('index'), $data);

    }

    
    public function create()
    {
        $data = [
            'model' => new Sale(),
        ];

        return view($this->path('create'), $data);

    }

    public function store(Request $request)
    {
        //
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
