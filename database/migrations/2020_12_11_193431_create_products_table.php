<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->Integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->Integer('country_id')->unsigned();
            $table->Integer('unit_of_measurement_id')->unsigned();
            $table->foreign('unit_of_measurement_id')->references('id')->on('unit_of_measurements')->onDelete('cascade');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();
            $table->double('alert_quantity', 8, 2)->nullable();
            $table->double('selling_price', 15, 2)->nullable();
            $table->double('discount', 15, 2)->nullable();
            $table->enum('product_status', ['active', 'inactive']);

            $table->unsignedBigInteger('creator_user_id')->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('updator_user_id')->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
