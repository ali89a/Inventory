<?php

namespace App\Http\Controllers;

use App\Model\Purchase;
use App\Model\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.report.{$suffix}";
    }

    public function purchase(Request $request)
    {
        $data = Purchase::with('items');


        if ($request->from_date) {
            //  dd($request->all());
            $start = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
            $end = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
            $products = $data->whereBetween('created_at', [$start . " 00:00:00", $end . " 23:59:59"])->get();
            $data = [
                'purchases' => $products,
            ];

        } else {
           $data = [
    'purchases' => Purchase::all(),
];


        }

        return view($this->path('purchase'), $data);

    }
    public function sale(Request $request)
    {
        $data = Sale::with('items');


        if ($request->from_date) {
            //  dd($request->all());
            $start = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
            $end = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
            $products = $data->whereBetween('created_at', [$start . " 00:00:00", $end . " 23:59:59"])->get();
            $data = [
                'sales' => $products,
            ];

        } else {
           $data = [
    'sales' => Sale::all(),
];


        }

        return view($this->path('sale'), $data);

    }
    public function profit()
    {
        $data = [
            'profit' =>[],
        ];

        return view($this->path('profit'), $data);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
