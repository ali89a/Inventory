<?php

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Company;


$factory->define(App\Model\CompanyBranch::class, function (Faker $faker) {
    return [
       	'name' => $faker->name,
        'address' => $faker->address,
        'creator_user_id'=>User::all()->random()->id,
        'company_id'=>Company::all()->random()->id,

    ];
});
