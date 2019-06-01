<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_service', function (Blueprint $table) {
            $table->Increments('id_transaksi_service');
            $table->integer('id_detail')->unsigned();
            $table->foreign('id_detail')->references('id_detail')->on('detail_motor')->onUpdate('cascade');
            $table->integer('id_jasa')->unsigned();
            $table->foreign('id_jasa')->references('id_jasa')->on('jasa_service')->onUpdate('cascade');
            $table->integer('id_montir')->unsigned();
            $table->foreign('id_montir')->references('id_pegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onUpdate('cascade');
            $table->double('sub_total');
            $table->integer('jumlah_jasa');
            $table->string('status_service',20);
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
        Schema::dropIfExists('transaksi_service');
    }
}
