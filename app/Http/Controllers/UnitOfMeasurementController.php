<?php

namespace App\Http\Controllers;

use App\Model\UnitOfMeasurement;
use Illuminate\Http\Request;

class UnitOfMeasurementController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.unit.{$suffix}";
    }
    public function index()
    {
        $data = [
            'units' => UnitOfMeasurement::all(),
        ];
        return view($this->path('index'), $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new UnitOfMeasurement,
        ];

        return view($this->path('create'), $data);

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
            'name' => 'required|unique:countries',
        ]);

        $unit = new UnitOfMeasurement();
        $unit->name = $request->name;
        $unit->save();

        \Toastr::success('Unit Created Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('unit.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }
}
