<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class transaksi_penjualanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_penjualan')->insert([
            [
                'id_sparepart'=> 1,
                'id_detail'=> 2,
                'id_transaksi'=> 3,
                'sub_total'=> 30000,
                'jumlah_sparepart'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'id_detail'=> 5,
                'id_transaksi'=> 6,
                'sub_total'=> 30000,
                'jumlah_sparepart'=> 2,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 3,
                'id_detail'=> 8,
                'id_transaksi'=> 9,
                'sub_total'=> 30000,
                'jumlah_sparepart'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'id_detail'=> 3,
                'id_transaksi'=> 2,
                'sub_total'=> 15000,
                'jumlah_sparepart'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'id_detail'=> 6,
                'id_transaksi'=> 5,
                'sub_total'=> 15000,
                'jumlah_sparepart'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'id_detail'=> 9,
                'id_transaksi'=> 8,
                'sub_total'=> 15000,
                'jumlah_sparepart'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
