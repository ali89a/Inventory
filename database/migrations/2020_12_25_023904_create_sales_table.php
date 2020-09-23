<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('invoice_number', 20);
            $table->double('subtotal', 15, 2);
            $table->double('discount', 8, 2);
            $table->double('grandtotal', 15, 2);
            $table->double('receive_amount', 15, 2);
            $table->double('change_amount', 15, 2);
            $table->double('vat', 8, 2)->nullable();
            $table->date('date')->nullable();
            $table->text('remark')->nullable();
            $table->Integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
