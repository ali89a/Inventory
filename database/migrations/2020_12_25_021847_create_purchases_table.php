<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number', 20);
            $table->date('date');
            $table->double('net_amount', 15, 2);
            $table->double('grand_amount', 15, 2);
            $table->text('remark')->nullable();
            $table->Integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->Integer('company_branch_id')->unsigned()->nullable();
            $table->foreign('company_branch_id')->references('id')->on('company_branches')->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
}