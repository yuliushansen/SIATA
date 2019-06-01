<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_motor', function (Blueprint $table) {
            $table->Increments('id_detail');
            $table->string('id_motor')->nullable();
            $table->foreign('id_motor')->references('id_motor')->on('motor')->onUpdate('cascade');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onUpdate('cascade');                      
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
        Schema::dropIfExists('detail_motor');
    }
}
