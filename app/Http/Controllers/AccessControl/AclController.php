<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AclController extends Controller
{
    protected function path(string $suffix){
        return "admin.access_control.acl.{$suffix}";
    }

    public function index()
    {
        $data=[
            'roles'=>Role::all(),
            'permissions'=>Permission::all(),
            'role_has_permissions'=>\App\RoleHasPermission::all(),
            'cross_check'=>function($role_has_permissions, $role_id, $permission_id){

                foreach($role_has_permissions as $row){
                    if($role_id==$row->role_id && $permission_id==$row->permission_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        return view($this->path('index'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function change_role_permission(Request $request){

        $role_model=Role::find($request->role_id);

        if($request->status) $role_model->givePermissionTo($request->permission_id);
        else $role_model->revokePermissionTo($request->permission_id);

        return response()->json('Role permission matrix changed successfully!.', 200);

    }

    public function user_permission_matrix(){

        $data=[
            'users'=>\App\User::all(),
            'permissions'=>Permission::all(),
            'model_has_permissions'=>\App\ModelHasPermission::all(),
            'cross_check'=>function($model_has_permissions, $user_id, $permission_id){

                foreach($model_has_permissions as $row){
                    if($user_id==$row->model_id && $permission_id==$row->permission_id){
                        return 'checked';
                    }
                }

                return '';
            }
        ];

        //dd($data);

        return view($this->path('user_permission_matrix'), $data);

    }

    public function store_user_permission_matrix(Request $request){
        $matrix=$request->get('matrix');
        \App\ModelHasPermission::truncate();
        if(is_array($matrix)){
            foreach($matrix as $user_id=>$permissions){
                $user=\App\User::find($user_id);
                $user->syncPermissions($permissions);
            }
        }

        \Toastr::success('Information Updated Successfully!.', '', ["progressbar" => true]);
        return redirect()->back();

    }
}
