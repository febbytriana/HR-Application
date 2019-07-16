<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_pendidikans', function (Blueprint $table) {
            $table->increments('id_temp_pendidikan');
            
            $table->integer('id_pendidikan')->unsigned()->nullable();
            $table->foreign('id_pendidikan')->references('id_pendidikan')->on('pendidikans')->onUpdate('set null')->onDelete('set null');

            $table->string('sekolah'); 
            $table->string('tahun_lulus');

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
        Schema::dropIfExists('temp_pendidikans');
    }
}
