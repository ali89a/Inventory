<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
$data = [
    [ 'name' => 'Create Generic','guard_name' => 'Web' ],
    [ 'name' => 'Store Generic','guard_name' => 'Web' ],
    [ 'name' => 'List Generic','guard_name' => 'Web' ],
    [ 'name' => 'Show Generic','guard_name' => 'Web' ],
    [ 'name' => 'Edit Generic','guard_name' => 'Web' ],
    [ 'name' => 'Update Generic','guard_name' => 'Web' ],
    [ 'name' => 'Delete Generic','guard_name' => 'Web' ],
    

];

\DB::table('permissions')->insert($data);

    }
}
