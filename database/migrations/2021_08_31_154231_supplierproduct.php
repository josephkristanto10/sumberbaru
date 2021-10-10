<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Supplierproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_product', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idsupplier')->unsigned();
            $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->integer('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('product');
            $table->integer('price')->default("0");
            $table->string('status')->nullable();
            $table->timestamps();
            $table->unique([
                'idsupplier',
                'idproduct'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supplier_product');
    }
}
