<?php

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Company;

$factory->define(App\Model\ProductGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'short_name' => $faker->name,
        'description' => $faker->paragraph,  
        'creator_user_id'=>User::all()->random()->id,
        'company_id'=>Company::all()->random()->id,
    ];
});
