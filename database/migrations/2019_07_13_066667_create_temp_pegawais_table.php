<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_pegawais', function (Blueprint $table) {
            $table->increments('id_temp_pegawai');

            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

            $table->string('nik');
            $table->string('nama',100);
            $table->string('tempat');
            $table->date('tgl');
            $table->string('alamat');
            $table->string('jk');
            $table->string('agama');
            $table->string('warga_negara');
            $table->string('status_kawin');
            $table->string('goldar');
            $table->string('penyakit');
            $table->string('telp');
            $table->string('email');
            $table->string('image')->nullable();
            
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
        Schema::dropIfExists('temp_pegawais');
    }
}
