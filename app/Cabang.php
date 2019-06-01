<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    // field yang akan diisi
    protected $fillable = [
        'nama_cabang', 'alamat','nomor'
    ];
    public function pegawai()
     {
         return $this->hasMany(Pegawai::class,'id_cabang');
     }
     public function transaksi()
     {
         return $this->hasMany(Transaksi::class,'id_cabang');
     }
}
