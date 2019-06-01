<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class pembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayaran')->insert([
            [
                'id_transaksi'=> 1,
                'discount'=> 0,
                'kembalian'=> 0,
                'jumlah_uang'=> 70000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_transaksi'=> 2,
                'discount'=> 0,
                'kembalian'=> 70000,
                'jumlah_uang'=> 100000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_transaksi'=> 3,
                'discount'=> 30000,
                'kembalian'=> 30000,
                'jumlah_uang'=> 100000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
