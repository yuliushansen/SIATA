<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class transaksi_serviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_service')->insert([
            [
                'id_detail'=> 1,
                'id_jasa'=> 1,
                'id_montir'=> 4,
                'id_transaksi'=> 1,
                'sub_total'=> 50000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_detail'=> 1,
                'id_jasa'=> 2,
                'id_montir'=> 4,
                'id_transaksi'=> 1,
                'sub_total'=> 20000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            // [
            //     'id_detail'=> 4,
            //     'id_jasa'=> 1,
            //     'id_montir'=> 7,
            //     'id_transaksi'=> 4,
            //     'sub_total'=> 50000,
            //     'jumlah_jasa'=> 1,
            //     'status_service'=> 'Belum Selesai',
            //     'created_at'=> Carbon::now(),
            //     'updated_at'=> Carbon::now()
            // ],
            [
                'id_detail'=> 4,
                'id_jasa'=> 2,
                'id_montir'=> 7,
                'id_transaksi'=> 4,
                'sub_total'=> 20000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Belum Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_detail'=> 7,
                'id_jasa'=> 1,
                'id_montir'=> 10,
                'id_transaksi'=> 7,
                'sub_total'=> 50000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Belum Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_detail'=> 7,
                'id_jasa'=> 2,
                'id_montir'=> 10,
                'id_transaksi'=> 7,
                'sub_total'=> 20000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Belum Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            // [
            //     'id_detail'=> 3,
            //     'id_jasa'=> 1,
            //     'id_montir'=> 4,
            //     'id_transaksi'=> 2,
            //     'sub_total'=> 50000,
            //     'jumlah_jasa'=> 1,
            //     'status_service'=> 'Selesai',
            //     'created_at'=> Carbon::now(),
            //     'updated_at'=> Carbon::now()
            // ],
            [
                'id_detail'=> 6,
                'id_jasa'=> 1,
                'id_montir'=> 7,
                'id_transaksi'=> 5,
                'sub_total'=> 50000,
                'jumlah_jasa'=> 1,
                'status_service'=> 'Belum Selesai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            // [
            //     'id_detail'=> 9,
            //     'id_jasa'=> 1,
            //     'id_montir'=> 10,
            //     'id_transaksi'=> 8,
            //     'sub_total'=> 50000,
            //     'jumlah_jasa'=> 1,
            //     'status_service'=> 'Belum Selesai',
            //     'created_at'=> Carbon::now(),
            //     'updated_at'=> Carbon::now()
            // ]
        ]);
    }
}
