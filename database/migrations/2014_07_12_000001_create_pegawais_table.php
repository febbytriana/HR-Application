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
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('set null')->onDelete('set null');

            $table->string('nama');
            $table->enum('jk',['Laki - Laki','Perempuan']);
            $table->string('tempat');
            $table->date('tgl');
            $table->string('agama');
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
