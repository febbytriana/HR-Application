<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id_pegawai');

            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');

            $table->integer('id_jabatan')->unsigned()->nullable();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onUpdate('set null')->onDelete('set null');

            $table->string('nik');
            $table->string('nama');
            $table->string('ttl');
            $table->string('alamat');
            $table->string('jk');
            $table->string('agama');
            $table->string('warga_negara');
            $table->string('status_kawin');
            $table->string('goldar');
            $table->string('penyakit');
            $table->string('telp');
            $table->string('email');
            $table->string('image');
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
        Schema::dropIfExists('pegawais');
    }
}
