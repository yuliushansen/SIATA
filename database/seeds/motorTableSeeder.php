<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class motorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motor')->insert([
            [
                'id_motor'=> 'YMH-01',
                'id_pelanggan'=> 1,
                'merk_motor'=> 'Yamaha',
                'tipe_motor'=> 'Jupiter Z',
                'nomor_polisi'=> 'AB 2541 ZE',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-01',
                'id_pelanggan'=> 3,
                'merk_motor'=> 'Honda',
                'tipe_motor'=> 'Beat',
                'nomor_polisi'=> 'AB 7541 TE',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_motor'=> 'HND-02',
                'id_pelanggan'=> 2,
                'merk_motor'=> 'Honda',
                'tipe_motor'=> 'Scoopy',
                'nomor_polisi'=> 'AB 2671 PJ',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ]);
    }
}
