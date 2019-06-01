<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_barang', function (Blueprint $table) {
            $table->Increments('id_history');
            $table->integer('id_sparepart')->unsigned();
            $table->foreign('id_sparepart')->references('id_sparepart')->on('sparepart')->onUpdate('cascade');
            $table->date('tanggal');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_keluar');
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
        Schema::dropIfExists('history_barang');
    }
}
