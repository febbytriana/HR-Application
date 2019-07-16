<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_sertifikats', function (Blueprint $table) {
            $table->increments('id_temp_sertifikat');
            
            $table->integer('id_sertifikat')->unsigned()->nullable();
            $table->foreign('id_sertifikat')->references('id_sertifikat')->on('sertifikats')->onUpdate('set null')->onDelete('set null');

            $table->string('sertifikat');
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
        Schema::dropIfExists('temp_sertifikats');
    }
}
