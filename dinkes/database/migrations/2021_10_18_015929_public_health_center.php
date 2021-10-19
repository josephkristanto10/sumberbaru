<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublicHealthCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_health_center', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_public_health_office')->unsigned();
            $table->foreign('id_public_health_office')->references('id')->on('public_health_office');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
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
        Schema::dropIfExists('public_health_center');
    }
}
