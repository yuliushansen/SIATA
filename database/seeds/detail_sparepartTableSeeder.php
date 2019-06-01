<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class detail_sparepartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_sparepart')->insert([
            [
                'id_sparepart'=> 1,
                'id_motor'=> 'YMH-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 2,
                'id_motor'=> 'HND-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_sparepart'=> 3,
                'id_motor'=> 'HND-02',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
