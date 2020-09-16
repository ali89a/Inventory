<?php

use Faker\Generator as Faker;
use App\Model\User;

$factory->define(App\Model\Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'short_name'=>$faker->word,
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'telephone'=>$faker->phoneNumber,
        'fax'=>$faker->phoneNumber,
        'website'=>'www.' . $faker->domainName,
        'address'=>$faker->city . ', ' . $faker->country,
        'description'=>$faker->paragraph,
        'creator_user_id'=>function(){
            return User::all()->random();
        }
    ];
});
