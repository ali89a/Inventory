<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      
        //  $this->call(UserSeeder::class);
          $this->call(AccessControlsTableSeeder::class);
         // $this->call(PermissionSeeder::class);
        
      //   factory(App\Model\User::class,10)->create();
      //  factory(App\Model\Company::class,10)->create();
        //factory(App\Model\CompanyBranch::class,10)->create();
     //   $this->call(UnitOfMeasurementsTableSeeder::class);
       // factory(App\Model\ProductBrand::class,50)->create();
     //   factory(App\Model\ProductCategory::class,50)->create();
      //  factory(App\Model\ProductGroup::class,10)->create();
    //    factory(App\Model\Supplier::class,50)->create();
    //    factory(App\Model\Customer::class,50)->create();
      //  factory(App\Model\Product::class,100)->create();
      //  $this->call(CountrySeeder::class);

    }
}
