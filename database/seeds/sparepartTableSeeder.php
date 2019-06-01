<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class sparepartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sparepart')->insert([
            [
                'kode_sparepart'=> '1111-KTM-809',
                'nama_sparepart'=> 'Gear Rantai Set',
                'merk_sparepart'=> 'Astra Honda Motor',
                'tipe_sparepart'=> 'Gear Motor',
                'lokasi_sparepart'=> 'DPN-KAYU-01',
                'harga_jual'=> 30000,
                'satuan_sparepart'=> 'set',
                'jumlah_sparepart'=> 20,
                'gambar'=> 'Gear_Rantai.jpg',
                'minimal_stok'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'kode_sparepart'=> '1421-KTP-929',
                'nama_sparepart'=> 'Busi',
                'merk_sparepart'=> 'Astra Honda Motor',
                'tipe_sparepart'=> 'Kelistrikan',
                'lokasi_sparepart'=> 'DPN-KAYU-02',
                'harga_jual'=> 15000,
                'satuan_sparepart'=> 'buah',
                'jumlah_sparepart'=> 120,
                'gambar'=> 'Busi.jpg',
                'minimal_stok'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'kode_sparepart'=> '1483-KKO-829',
                'nama_sparepart'=> 'Ban luar',
                'merk_sparepart'=> 'Astra Honda Motor',
                'tipe_sparepart'=> 'Roda',
                'lokasi_sparepart'=> 'DPN-KAYU-03',
                'harga_jual'=> 30000,
                'satuan_sparepart'=> 'buah',
                'jumlah_sparepart'=> 20,
                'gambar'=> 'Ban_Luar.jpg',
                'minimal_stok'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
