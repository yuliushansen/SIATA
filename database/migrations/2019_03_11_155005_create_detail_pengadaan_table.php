<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaan', function (Blueprint $table) {
            $table->Increments('id_detail_pengadaan');
            $table->integer('id_transaksi_pengadaan')->unsigned();
            $table->foreign('id_transaksi_pengadaan')->references('id_transaksi_pengadaan')->on('transaksi_pengadaan')->onUpdate('cascade');
            $table->integer('id_sparepart')->unsigned();
            $table->foreign('id_sparepart')->references('id_sparepart')->on('sparepart')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->integer('jumlah_datang');
            $table->double('harga_beli');
            $table->double('harga_jual');
            $table->double('sub_total');
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
        Schema::dropIfExists('detail_pengadaan');
    }
}
