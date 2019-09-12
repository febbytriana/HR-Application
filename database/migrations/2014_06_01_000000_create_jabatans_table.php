<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void


     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id_jabatan');
            $table->string('jabatan');
            $table->integer('gaji_pokok');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();

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
        Schema::dropIfExists('jabatans');
    }
}