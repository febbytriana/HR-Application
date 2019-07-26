<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->Increments('id_pendidikan');
            $table->string('sd');
            $table->string('lulus_sd');
            $table->string('smp');
            $table->string('lulus_smp');
            $table->string('smk')->nullable();
            $table->string('lulus_smk')->nullable();
            $table->string('tingkat_pt')->nullable();
            $table->string('nama_universitas')->nullable();
            $table->string('lulus_pt')->nullable();

            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

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
        Schema::dropIfExists('pendidikans');
    }
}
