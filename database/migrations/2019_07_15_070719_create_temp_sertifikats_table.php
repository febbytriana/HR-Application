<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_sertifikats', function (Blueprint $table) {
            $table->increments('id_temp_sertifikat');
            
            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

            $table->string('nama_event');
            $table->date('tahun_event');
            $table->string('ket_prestasi')->nullable();
            $table->string('gambar_sertifikat')->nullable();
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
        Schema::dropIfExists('temp_sertifikats');
    }
}
