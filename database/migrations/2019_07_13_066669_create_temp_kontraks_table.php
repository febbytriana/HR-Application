<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_kontraks', function (Blueprint $table) {
            $table->increments('id_temp_kontrak');

            $table->integer('id_kontrak')->unsigned()->nullable();
            $table->foreign('id_kontrak')->references('id_kontrak')->on('kontraks')->onUpdate('set null')->onDelete('set null');

            $table->string('kontrak');
            $table->string('tahun');
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
        Schema::dropIfExists('temp_kontraks');
    }
}
