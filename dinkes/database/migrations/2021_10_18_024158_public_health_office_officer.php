<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublicHealthOfficeOfficer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_health_office_officer', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('id_public_health_office')->unsigned();
            $table->foreign('id_public_health_office')->references('id')->on('public_health_office');
            $table->string('name');
            $table->string('nik');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string("status");
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
