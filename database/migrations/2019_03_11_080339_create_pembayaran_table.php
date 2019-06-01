<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->Increments('id_pembayaran');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onUpdate('cascade');
            $table->double('discount');
            $table->double('kembalian');
            $table->double('jumlah_uang');
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
        Schema::dropIfExists('pembayaran');
    }
}
