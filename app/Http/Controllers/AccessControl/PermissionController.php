<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{ 
    protected function path(string $suffix){
        return "admin.access_control.permission.{$suffix}";
    }

    public function index()
    {
        $data=[
            'permissions'=>Permission::all(),
        ];

        return view($this->path('index'), $data);
    }

    public function create()
    {
        $data=[

            'model'=>new Permission,
            'route_name'=>'permission',
            'title'=>'Permissions'

        ];

        return view($this->path('create'), $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:permissions'
        ]);

        Permission::create($request->all());
        \Toastr::success('Permission Information crated Successfully!.', '', ["progressbar" => true]);
        return back();
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
