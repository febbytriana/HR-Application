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

            $table->string('nik')->nullable();
            $table->string('nama',100)->nullable();
            $table->string('tempat')->nullable();
            $table->date('tgl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jk')->nullable();
            $table->string('agama')->nullable();
            $table->string('warga_negara')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('goldar')->nullable();
            $table->string('penyakit')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
