<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class pegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            [
                'id_cabang'=> '1',
                'nama'=> 'Laura',
                'role'=> 'Owner',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647891852',
                'gaji'=> 5000000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '3',
                'nama'=> 'Budi',
                'role'=> 'Kasir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647891235',
                'gaji'=> 2000000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '3',
                'nama'=> 'Ani',
                'role'=> 'CS',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647649235',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '3',
                'nama'=> 'Beni',
                'role'=> 'Montir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647895695',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '2',
                'nama'=> 'Loppy',
                'role'=> 'Kasir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647845635',
                'gaji'=> 2000000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '2',
                'nama'=> 'Niken',
                'role'=> 'CS',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085646939235',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '2',
                'nama'=> 'Paulus',
                'role'=> 'Montir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647895695',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '1',
                'nama'=> 'Nesti',
                'role'=> 'Kasir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647891734',
                'gaji'=> 2000000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '1',
                'nama'=> 'Hesti',
                'role'=> 'CS',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647641595',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_cabang'=> '1',
                'nama'=> 'Ari',
                'role'=> 'Montir',
                'alamat'=> 'Jl.Kledokan',
                'nomor'=> '085647535695',
                'gaji'=> 2500000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ]);
    }
}
