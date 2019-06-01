<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class pelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
                'nama_pelanggan'=> 'Stefan',
                'nomor_pelanggan'=> '081265483212',
                'alamat_pelanggan'=> 'Jl.Kledokan',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_pelanggan'=> 'Adi',
                'nomor_pelanggan'=> '081265783212',
                'alamat_pelanggan'=> 'Jl.Babarsari',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_pelanggan'=> 'Audrey',
                'nomor_pelanggan'=> '081265481212',
                'alamat_pelanggan'=> 'Jl.Seturan',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
