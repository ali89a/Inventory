<?php

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Company;
use App\Model\ProductCategory;
use App\Model\ProductBrand;
use App\Model\ProductGroup;
use App\Model\UnitOfMeasurement;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'company_id'=>Company::all()->random()->id,
        'product_category_id'=>ProductCategory::all()->random()->id,
        'product_brand_id'=>ProductBrand::all()->random()->id,
        'product_group_id'=>ProductGroup::all()->random()->id,
        'unit_of_measurement_id'=>UnitOfMeasurement::all()->random()->id,
        'name'=>$faker->word,
        'short_name'=>$faker->word,
        'code'=>$faker->unique()->numberBetween(123456789,987654321),
        'sku'=>$faker->unique()->numberBetween(123456789,987654321),
        'description'=>$faker->paragraph,
        'alert_quantity'=>$faker->numberBetween(5,20),
        'selling_price'=>$faker->numberBetween(100,1000),
        'discount'=>$faker->numberBetween(10,100),
        'creator_user_id'=>User::all()->random()->id
    ];
});
