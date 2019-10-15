<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_pegawais', function (Blueprint $table) {
            $table->increments('id_kpi');
            
            $table->integer('id_pegawai')->unsigned()->nullable();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onUpdate('set null')->onDelete('set null');

            $table->string('index1')->nullable();
            $table->string('index2')->nullable();
            $table->string('index3')->nullable();
            $table->string('index4')->nullable();
            $table->string('index5')->nullable();
            $table->string('index6')->nullable();
            $table->string('index7')->nullable();
            $table->string('index8')->nullable();
            $table->string('index9')->nullable();
            $table->string('index10')->nullable();
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
        Schema::dropIfExists('kpi_pegawais');
    }
}
