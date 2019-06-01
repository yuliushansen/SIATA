<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pengadaan', function (Blueprint $table) {
            $table->Increments('id_transaksi_pengadaan');
            $table->integer('id_cs')->unsigned();
            $table->foreign('id_cs')->references('id_pegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onUpdate('cascade');
            $table->date('tanggal');
            $table->string('status_pengadaan',25);
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
        Schema::dropIfExists('transaksi_pengadaan');
    }
}
