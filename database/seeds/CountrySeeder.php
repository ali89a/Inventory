<?php

use App\Model\Company;
use App\Model\Country;
use App\Model\User;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Country;
        $item->name = 'Bangladesh';
        $item->description = 'Description';
        $item->company_id = Company::all()->random()->id;
        $item->creator_user_id = User::all()->random()->id;
        $item->save();

        $item = new Country;
        $item->name = 'India';
        $item->description = 'Description';
        $item->company_id = Company::all()->random()->id;
        $item->creator_user_id = User::all()->random()->id;
        $item->save();

        $item = new Country;
        $item->name = 'Pakistan';
        $item->description = 'Description';
        $item->company_id = Company::all()->random()->id;
        $item->creator_user_id = User::all()->random()->id;
        $item->save();

    }
}
