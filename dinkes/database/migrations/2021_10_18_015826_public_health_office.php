<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublicHealthOffice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_health_office', function (Blueprint $table) {
            $table->increments("id");
            // $table->integer('idsupplierproduct')->unsigned();
            // $table->foreign('idsupplierproduct')->references('id')->on('supplier_product');
            $table->string('name');
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
        Schema::dropIfExists('public_health_office');
    }
}
