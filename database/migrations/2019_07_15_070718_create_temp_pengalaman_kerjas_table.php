<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPengalamanKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_pengalaman_kerjas', function (Blueprint $table) {
            $table->increments('id_temp_pengalaman');

            $table->integer('id_pengalaman')->unsigned()->nullable();
            $table->foreign('id_pengalaman')->references('id_pengalaman')->on('pengalaman_kerjas')->onUpdate('set null')->onDelete('set null');

            $table->string('nama_perusahaan');
            $table->string('jabatan');
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
        Schema::dropIfExists('temp_pengalaman_kerjas');
    }
}
