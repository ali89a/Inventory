<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
