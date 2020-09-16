<?php

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Company;

$factory->define(App\Model\Supplier::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'short_name'=>$faker->word,
        'email'=>$faker->email,
        'mobile'=>$faker->phoneNumber,
        'website'=>'www.' . $faker->domainName,
        'address'=>$faker->city . ', ' . $faker->country,
        'creator_user_id'=>User::all()->random()->id,
        'company_id'=>Company::all()->random()->id,
    ];
});
