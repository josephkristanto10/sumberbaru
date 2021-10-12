<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments("id");
            // $table->integer('idproduct')->unsigned();
            // $table->foreign('idproduct')->references('id')->on('product');
            // $table->integer('idsupplier')->unsigned();
            // $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->string('transaction_no');
            $table->date('transaction_date');
            $table->string('transaction_method');
            $table->string('transaction_shipment_delivery');
            $table->integer('transaction_shipment_delivery_cost');
            $table->string('transaction_customer');
            $table->string('transaction_note');
            $table->integer('qty_item');
            $table->integer('total');
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
        Schema::dropIfExists('invoice');
    }
}
