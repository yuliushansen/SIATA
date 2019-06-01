<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->Increments('id_transaksi');
            $table->integer('id_cabang')->unsigned();
            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')->onUpdate('cascade');
            $table->integer('id_kasir')->unsigned();
            $table->foreign('id_kasir')->references('id_pegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('id_cs')->unsigned();
            $table->foreign('id_cs')->references('id_pegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade');
            $table->string('jenis_transaksi',2);
            $table->date('tanggal');
            $table->string('status_transaksi',25);
            $table->double('total_harga');
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
        Schema::dropIfExists('transaksi');
    }
}
