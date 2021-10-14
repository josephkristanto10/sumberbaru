<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReturMgration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_return', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('product');
            $table->integer('idsupplier')->unsigned();
            $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->string("returndate");
            $table->string("confirmationdate")->nullable();
            $table->string("returnitemqty")->nullable();
            $table->string("returnitemmoney")->nullable();
            $table->string('qty');
            $table->string('info');
            $table->string('solution')->nullable();
            $table->string('status')->default('Process');
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
        //
    }
}
