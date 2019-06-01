<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->Increments('id_pegawai');
            $table->integer('id_cabang')->unsigned();
            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')->onUpdate('cascade');
            $table->string('nama', 50);
            $table->string('role', 10);
            $table->string('alamat', 50);
            $table->string('nomor', 12);
            $table->double('gaji');
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
        Schema::dropIfExists('pegawai');
    }
}
