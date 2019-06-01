<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class supplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'nama_supplier'=> 'Roda Mas',
                'nama_sales'=> 'Bintang',
                'nomor_sales'=> '087895783212',
                'alamat'=> 'Jl.Seturan Raya',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_supplier'=> 'Jaya Oil',
                'nama_sales'=> 'Jack',
                'nomor_sales'=> '087895775312',
                'alamat'=> 'Jl.Seturan Raya',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'nama_supplier'=> 'Sinar Tanjung',
                'nama_sales'=> 'Juan',
                'nomor_sales'=> '087875383212',
                'alamat'=> 'Jl.Seturan Raya',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
