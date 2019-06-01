<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class detail_motorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_motor')->insert([
            [
                'id_motor'=> 'YMH-01',
                'id_transaksi'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-01',
                'id_transaksi'=> 3,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-02',
                'id_transaksi'=> 2,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'YMH-01',
                'id_transaksi'=> 4,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-01',
                'id_transaksi'=> 6,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-02',
                'id_transaksi'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'YMH-01',
                'id_transaksi'=> 7,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-01',
                'id_transaksi'=> 9,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-02',
                'id_transaksi'=> 8,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
