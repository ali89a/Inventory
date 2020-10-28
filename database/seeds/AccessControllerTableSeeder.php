<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AccessControlsTableSeeder extends Seeder
{

    public function run()
    {

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $dev = \App\User::where('email', 'admin@gmail.com')->first();

        if (empty($dev)) {

            $data = [
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('12345678'),
                ],
            
            ];

            \DB::table('users')->insert($data);

        }

        $dev = \App\User::where('email', 'admin@gmail.com')->first();

        //data for roles table
        $data = [
            ['name' => 'Admin', 'guard_name' => 'web'],

        ];
        \DB::table('roles')->insert($data);

        //data for permissions table
        $data = [
            ['name' => 'Dashboard', 'guard_name' => 'web'],

            ['name' => 'Role List', 'guard_name' => 'web'],
            ['name' => 'Role Create', 'guard_name' => 'web'],
            ['name' => 'Role Show', 'guard_name' => 'web'],
            ['name' => 'Role Edit', 'guard_name' => 'web'],
            ['name' => 'Role Delete', 'guard_name' => 'web'],

            ['name' => 'User List', 'guard_name' => 'web'],
            ['name' => 'User Create', 'guard_name' => 'web'],
            ['name' => 'User Show', 'guard_name' => 'web'],
            ['name' => 'User Edit', 'guard_name' => 'web'],
            ['name' => 'User Delete', 'guard_name' => 'web'],

           

        ];

        \DB::table('permissions')->insert($data);
        //Data for role user pivot
        $data = [
            ['role_id' => 1, 'model_type' => 'App\User', 'model_id' => $dev->id],
        ];
        \DB::table('model_has_roles')->insert($data);
        //Data for role permission pivot
        $permissions = Permission::all();
        foreach ($permissions as $key => $value) {
            $data = [
                ['permission_id' => $value->id, 'role_id' => 1],
            ];

            \DB::table('role_has_permissions')->insert($data);

        }

    }
}
