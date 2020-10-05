<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Sale;

class ReportController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.report.{$suffix}";
    }
    public function purchase()
    {
        $data = [
            'purchases' => Purchase::all(),
        ];

        return view($this->path('purchase'), $data);
    }
    public function sale()
    {
        $data = [
            'sales' => Sale::all(),
        ];

        return view($this->path('sale'), $data);

    }
    public function profit()
    {
        $data = [
            'profit' => '',
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
