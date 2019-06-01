<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMotor extends Model
{
    protected $table = 'detail_motor';
    protected $primaryKey = 'id_detail';
    // field yang akan diisi
    protected $fillable = [
        'id_motor','id_transaksi'
     ];
     public function transaksi_service()
     {
         return $this->hasMany(TransaksiService::class,'id_detail');
     }
     public function transaksi_penjualan()
     {
         return $this->hasMany(TransaksPenjualan::class,'id_detail');
     }
     public function transaksi()
     {
         return $this->belongsTo(Transaksi::class,'id_transaksi');
     }
     public function motor()
     {
         return $this->belongsTo(Motor::class,'id_motor');
     }
     
}
