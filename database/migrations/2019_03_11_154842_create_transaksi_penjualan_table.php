<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->Increments('id_transaksi_penjualan');
            $table->integer('id_sparepart')->unsigned();
            $table->foreign('id_sparepart')->references('id_sparepart')->on('sparepart')->onUpdate('cascade');
            $table->integer('id_detail')->unsigned();
            $table->foreign('id_detail')->references('id_detail')->on('detail_motor')->onUpdate('cascade');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onUpdate('cascade');
            $table->double('sub_total');
            $table->integer('jumlah_sparepart');
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
        Schema::dropIfExists('transaksi_penjualan');
    }
}
