<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected function path(string $suffix)
    {
        return "admin.access_control.user.{$suffix}";
    }

    public function index()
    {

       

        $data = [
            'users' => \App\User::all(),
            'carbon' => new \Carbon\Carbon
        ];

        return view($this->path('index'), $data);

    }


    public function create()
    {

        $data = [
            'model' => new \App\User,
            'roles' => Role::pluck('name', 'id'),
        ];

        return view($this->path('create'), $data);

    }


    public function store(Request $request)
    {

        // if (!auth()->user()->can('access_control_user_controller_store')) {
        //     abort(403, 'Unauthorized action.');
        // }

        //dd($request->all());

        $request->validate([

            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'roles' => 'required|array',
            'password' => 'required|string|min:8|confirmed'

        ]);

        $new_user = \App\User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        $new_user->syncRoles($request->get('roles'));

        \Toastr::success('User crated Successfully!.', '', ["progressbar" => true]);
        return back();

    }


    public function show(\App\User $user)
    {


    }


    public function edit(\App\User $user)
    {
      

        $data = [
            'model' => $user,
            'roles' => Role::pluck('name', 'id'),
            'selected_roles' => Role::whereIn('name', $user->getRoleNames())->pluck('id')
        ];

        //dd($data['selected_roles']);

        return view($this->path('create'), $data);

    }


    public function update(Request $request, \App\User $user)
    {
        // if (!auth()->user()->can('access_control_user_controller_update')) {
        //     abort(403, 'Unauthorized action.');
        // }
        //dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'required|array',
            'password' => 'nullable|string|min:8|confirmed'

        ]);

        $user->fill($request->only('name', 'email'));
        $user->syncRoles($request->get('roles'));
        if ($request->get('password')) $user->password = bcrypt($request->get('password'));
        $user->save();

        \Toastr::success('User Information Updated Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('user.index');

    }

    public function destroy(\App\User $user)
    {
        // if (!auth()->user()->can('access_control_user_controller_destroy')) {
        //     abort(403, 'Unauthorized action.');
        // }

        //$user->delete();
        return back();

    }
}
