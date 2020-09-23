<?php

use App\Model\Company;
use App\Model\UnitOfMeasurement;
use App\Model\User;
use Illuminate\Database\Seeder;

class UnitOfMeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new UnitOfMeasurement;
        $item->name = '1pcs';
        $item->short_name = 'KG';
        $item->description = 'Description';
        $item->creator_user_id =1;
		$item->save();
		
        $item = new UnitOfMeasurement;
        $item->name = '2pcs';
        $item->short_name = 'KG';
        $item->description = 'Description';
        $item->creator_user_id = 1;
		$item->save();
		
        $item->name = '3pcs';
        $item->short_name = 'KG';
        $item->description = 'Description';
        $item->creator_user_id = 1;
		$item->save();
		
        $item->name = '1 Set';
        $item->short_name = 'KG';
        $item->description = 'Description';
        $item->creator_user_id = 1;
        $item->save();

    }
}
