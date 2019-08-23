<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratPerjalanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_perjalanans', function (Blueprint $table) {
            $table->bigIncrements('id_surat');

            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

            $table->string('kegiatan');
            $table->string('sponsor');
            $table->string('tujuan');
            $table->date('tgl_berangkat');
            $table->date('tgl_pulang');
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
        Schema::dropIfExists('surat_perjalanans');
    }
}
