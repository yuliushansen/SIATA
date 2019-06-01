<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(jasa_serviceTableSeeder::class);
        $this->call(pelangganTableSeeder::class);
        $this->call(cabangTableSeeder::class);
        $this->call(motorTableSeeder::class);
        $this->call(pegawaiTableSeeder::class);
        $this->call(akunTableSeeder::class);
        $this->call(supplierTableSeeder::class);
        $this->call(transaksi_pengadaanTableSeeder::class);
        $this->call(transaksiTableSeeder::class);
        $this->call(pembayaranTableSeeder::class);
        $this->call(detail_motorTableSeeder::class);
        $this->call(sparepartTableSeeder::class);
        $this->call(transaksi_penjualanTableSeeder::class);
        $this->call(transaksi_serviceTableSeeder::class);
        $this->call(detail_pengadaanTableSeeder::class);
        $this->call(detail_sparepartTableSeeder::class);
        $this->call(history_barangTableSeeder::class);
    }
}
