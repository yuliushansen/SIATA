<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class jasa_serviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jasa_service')->insert([
            [
                'nama_jasa'=> 'Service Mesin',
                'harga_jasa'=> 50000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_jasa'=> 'Service Kabel',
                'harga_jasa'=> 20000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_jasa'=> 'Service Roda',
                'harga_jasa'=> 20000,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
