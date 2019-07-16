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
            $table->increments('id');
            $table->string('nama');
            $table->enum('jk',['Laki - Laki','Perempuan']);
            $table->string('tempat');
            $table->date('tgl');
            $table->integer('umur');
            $table->string('agama');

            $table->integer('id_keluarga')->unsigned();
            $table->foreign('id_keluarga')->references('id')->on('temp_keluargas')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_pendidikan')->unsigned();
            $table->foreign('id_pendidikan')->references('id')->on('temp_pendidikans')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_sertifikat')->unsigned();
            $table->foreign('id_sertifikat')->references('id')->on('temp_sertifikats')->onUpdate('cascade')->onDelete('cascade');   
            
            $table->integer('id_kontak')->unsigned();
            $table->foreign('id_kontak')->references('id')->on('temp_no_darurats')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_kontrak')->unsigned();
            $table->foreign('id_kontrak')->references('id')->on('temp_kontraks')->onUpdate('cascade')->onDelete('cascade');

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
