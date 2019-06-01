<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sparepart', function (Blueprint $table) {
            $table->Increments('id_sparepart');
            $table->string('kode_sparepart',12)->unique();
            $table->string('nama_sparepart',50);
            $table->string('merk_sparepart',20);
            $table->string('tipe_sparepart',20);
            $table->string('lokasi_sparepart',12);
            $table->double('harga_jual');
            $table->string('satuan_sparepart',10);
            $table->integer('jumlah_sparepart');
            $table->string('gambar',255);
            $table->integer('minimal_stok');
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
        Schema::dropIfExists('sparepart');
    }
}
