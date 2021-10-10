<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Supplierproductlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('supplier_product_log', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idsupplierproduct')->unsigned();
            $table->foreign('idsupplierproduct')->references('id')->on('supplier_product');
            $table->integer('price')->default("0");
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
        Schema::dropIfExists('supplier_product_log');
    }
}
