<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => bcrypt('12345678'),
            ], [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
            ], [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('12345678'),
            ],

        ];

        \DB::table('users')->insert($data);

    }
}
