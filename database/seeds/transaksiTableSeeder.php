<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class transaksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi')->insert([
            [
                'id_cabang'=> 1,
                'id_kasir'=> 8,
                'id_cs'=> 9,
                'id_pelanggan'=> 1,
                'jenis_transaksi'=> 'SV',
                'tanggal'=> '2019-03-08',
                'status_transaksi'=> 'Lunas',
                'total_harga'=> 70000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 2,
                'id_kasir'=> 5,
                'id_cs'=> 6,
                'id_pelanggan'=> 2,
                'jenis_transaksi'=> 'SP',
                'tanggal'=> '2019-03-09',
                'status_transaksi'=> 'Lunas',
                'total_harga'=> 15000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 3,
                'id_kasir'=> 2,
                'id_cs'=> 3,
                'id_pelanggan'=> 3,
                'jenis_transaksi'=> 'SS',
                'tanggal'=> '2019-03-08',
                'status_transaksi'=> 'Lunas',
                'total_harga'=> 30000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 1,
                'id_kasir'=> 8,
                'id_cs'=> 9,
                'id_pelanggan'=> 1,
                'jenis_transaksi'=> 'SV',
                'tanggal'=> '2019-03-09',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 70000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 2,
                'id_kasir'=> 5,
                'id_cs'=> 6,
                'id_pelanggan'=> 2,
                'jenis_transaksi'=> 'SP',
                'tanggal'=> '2019-04-10',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 15000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 3,
                'id_kasir'=> 2,
                'id_cs'=> 3,
                'id_pelanggan'=> 3,
                'jenis_transaksi'=> 'SS',
                'tanggal'=> '2019-04-09',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 30000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 1,
                'id_kasir'=> 8,
                'id_cs'=> 9,
                'id_pelanggan'=> 1,
                'jenis_transaksi'=> 'SV',
                'tanggal'=> '2019-03-10',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 70000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 2,
                'id_kasir'=> 5,
                'id_cs'=> 6,
                'id_pelanggan'=> 2,
                'jenis_transaksi'=> 'SP',
                'tanggal'=> '2019-04-11',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 15000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> 3,
                'id_kasir'=> 2,
                'id_cs'=> 3,
                'id_pelanggan'=> 3,
                'jenis_transaksi'=> 'SS',
                'tanggal'=> '2019-05-10',
                'status_transaksi'=> 'Belum Lunas',
                'total_harga'=> 30000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
