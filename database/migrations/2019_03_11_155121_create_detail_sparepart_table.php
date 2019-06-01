<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sparepart', function (Blueprint $table) {
            $table->Increments('id_detail_sparepart');
            $table->integer('id_sparepart')->unsigned();
            $table->foreign('id_sparepart')->references('id_sparepart')->on('sparepart')->onUpdate('cascade');
            $table->string('id_motor');
            $table->foreign('id_motor')->references('id_motor')->on('motor')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_sparepart');
    }
}
