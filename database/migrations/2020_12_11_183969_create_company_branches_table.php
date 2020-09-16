<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address',100)->nullable();
            $table->Integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('company_branches');
    }
}
