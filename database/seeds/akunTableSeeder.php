<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class akunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun')->insert([
            [
                'id_pegawai'=> 1,
                'username'=> 'owner',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 2,
                'username'=> 'user1',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 3,
                'username'=> 'user2',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 5,
                'username'=> 'user3',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 6,
                'username'=> 'user4',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 8,
                'username'=> 'user5',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'id_pegawai'=> 9,
                'username'=> 'user6',
                'password'=> bcrypt('secret'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
