<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor', function (Blueprint $table) {
            $table->string('id_motor',8)->primary();
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade');
            $table->string('merk_motor',25);
            $table->string('tipe_motor',25);
            $table->string('nomor_polisi',12);
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
        Schema::dropIfExists('motor');
    }
}
