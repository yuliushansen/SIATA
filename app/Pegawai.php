<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    // field yang akan diisi
    protected $fillable = [
        'id_cabang','nama','role','alamat','nomor','gaji'
    ];
    public function transaksi_pengadaan()
     {
         return $this->hasMany(TransaksiPengadaan::class,'id_cs','id_pegawai');
     }
     public function cabang()
     {
         return $this->belongsTo('App\Cabang','id_cabang');
     }
     public function akun()
     {
         return $this->hasOne(Akun::class,'id_pegawai');
     }
     public function transaksi_service()
     {
         return $this->hasMany(TransaksiService::class,'id_montir','id_pegawai');
     }
     //////KEMUNGKINAN DIGANTI\\\\\\\\
     public function pegawai_kasir()
     {
         return $this->hasMany(Transaksi::class,'id_kasir','id_pegawai');
     }
     public function pegawai_cs()
     {
         return $this->hasMany(Transaksi::class,'id_cs','id_pegawai');
     }
}
