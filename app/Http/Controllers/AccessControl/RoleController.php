<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use foo\bar;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected function path(string $suffix){
        return "admin.access_control.role.{$suffix}";
    }

    public function index()
    {
        $data=[
            'roles'=>Role::all(),
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
        $data=[
            'model'=>new Role,
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
            'name'=>'required|unique:roles'
        ]);

        Role::create($request->all());
        \Toastr::success('Role Information crated Successfully!.', '', ["progressbar" => true]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data=[
            'model'=>$role,
        ];

        return view($this->path('create'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$role->id
        ]);

        $role->fill($request->all());
        $role->update();
        \Toastr::success('Role Information crated Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
