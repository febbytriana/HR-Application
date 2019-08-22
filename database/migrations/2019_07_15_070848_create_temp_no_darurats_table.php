<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempNoDaruratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_no_darurats', function (Blueprint $table) {
            $table->increments('id_temp_no');

            $table->integer('id_no_darurat')->unsigned()->nullable();
            $table->foreign('id_no_darurat')->references('id_no_darurat')->on('no_darurats')->onUpdate('set null')->onDelete('set null');

            $table->string('nama');
            $table->string('status');
            $table->string('nomor');
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
        Schema::dropIfExists('temp_no_darurats');
    }
}
