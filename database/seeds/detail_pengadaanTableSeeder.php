<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class detail_pengadaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_pengadaan')->insert([
            [
                'id_transaksi_pengadaan'=> 1,
                'id_sparepart'=> 2,
                'jumlah'=> 100,
                'jumlah_datang'=> 100,
                'harga_beli'=> 12500,
                'harga_jual'=> 15000,
                'sub_total'=> 1250000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_transaksi_pengadaan'=> 2,
                'id_sparepart'=> 1,
                'jumlah'=> 200,
                'jumlah_datang'=> 0,
                'harga_beli'=> 28000,
                'harga_jual'=> 30000,
                'sub_total'=> 5600000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_transaksi_pengadaan'=> 3,
                'id_sparepart'=> 3,
                'jumlah'=> 150,
                'jumlah_datang'=> 0,
                'harga_beli'=> 28000,
                'harga_jual'=> 30000,
                'sub_total'=> 4200000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
