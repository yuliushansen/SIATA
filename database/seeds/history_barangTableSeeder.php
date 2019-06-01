<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class history_barangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history_barang')->insert([
            [
                'id_sparepart'=> 1,
                'tanggal'=> '2019-01-05',
                'jumlah_masuk'=> 20,
                'jumlah_keluar'=> 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'tanggal'=> '2019-01-05',
                'jumlah_masuk'=> 120,
                'jumlah_keluar'=> 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 3,
                'tanggal'=> '2019-01-05',
                'jumlah_masuk'=> 20,
                'jumlah_keluar'=> 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'tanggal'=> '2019-03-09',
                'jumlah_masuk'=> 0,
                'jumlah_keluar'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 1,
                'tanggal'=> '2019-03-08',
                'jumlah_masuk'=> 0,
                'jumlah_keluar'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'tanggal'=> '2019-03-08',
                'jumlah_masuk'=> 100,
                'jumlah_keluar'=> 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            
        ]);
    }
}
