<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceDetailMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('product');
            $table->integer('idtransaction')->unsigned();
            $table->foreign('idtransaction')->references('id')->on('invoice');
            // $table->integer('idsupplier')->unsigned();
            // $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->integer('qty');
            $table->integer('selling_price');
            $table->integer('subtotal');
            $table->integer('buyingprice');
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
        Schema::dropIfExists('invoice_detail');
    }
}
