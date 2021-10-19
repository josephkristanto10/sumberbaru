<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_log', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('product');
            $table->integer('idsupplier')->unsigned();
            $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->integer('qty');
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
        Schema::dropIfExists('stok_log');
    }
}
