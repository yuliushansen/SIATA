<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class cabangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cabang')->insert([
            [
                'nama_cabang'=> 'Seturan',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647891852',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_cabang'=> 'Babarsari',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647891235',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_cabang'=> 'Demangan',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647895695',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
