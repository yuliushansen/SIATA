<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class transaksi_pengadaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_pengadaan')->insert([
            [
                'id_cs'=> 3,
                'id_supplier'=> 1,
                'tanggal'=> '2019-03-08',
                'status_pengadaan'=> 'Selesai',
                'total_harga'=> 1250000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cs'=> 6,
                'id_supplier'=> 2,
                'tanggal'=> '2019-03-09',
                'status_pengadaan'=> 'Sedang Dipesan',
                'total_harga'=> 5600000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cs'=> 9,
                'id_supplier'=> 3,
                'tanggal'=> '2019-03-11',
                'status_pengadaan'=> 'Sedang Dipesan',
                'total_harga'=> 4200000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
