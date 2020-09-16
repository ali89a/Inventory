<?php

use Illuminate\Database\Seeder;
use App\Model\UnitOfMeasurement;
use App\Model\User;
use App\Model\Company;

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
    	$item->name = 'Kilogram';
    	$item->short_name = 'KG';
    	$item->description = 'Description';
    	$item->company_id = Company::all()->random()->id;
    	$item->creator_user_id = User::all()->random()->id;
    	$item->save();

    	$item = new UnitOfMeasurement;
    	$item->name = 'Litre';
    	$item->short_name = 'LT';
    	$item->description = 'Description';
    	$item->company_id = Company::all()->random()->id;
    	$item->creator_user_id = User::all()->random()->id;
    	$item->save();
    }
}
