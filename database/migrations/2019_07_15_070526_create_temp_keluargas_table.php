<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_keluargas', function (Blueprint $table) {
            $table->increments('id_temp_keluarga');

            $table->integer('id_keluarga')->unsigned()->nullable();
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluargas')->onUpdate('set null')->onDelete('set null');

            $table->string('nama');
            $table->string('status');

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
        Schema::dropIfExists('temp_keluargas');
    }
}
