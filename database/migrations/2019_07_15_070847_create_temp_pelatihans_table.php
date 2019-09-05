<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_pelatihans', function (Blueprint $table) {
            $table->increments('id_temp_pelatihan');

            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

            $table->string('nama_event');
            $table->string('tempat_pelatihan');
            $table->string('peran');
            $table->date('tanggal');
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
        Schema::dropIfExists('temp_pelatihans');
    }
}
