<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengadaan extends Model
{
    protected $table = 'detail_pengadaan';
    protected $primaryKey = 'id_detail_pengadaan';
    // field yang akan diisi
    protected $fillable = [
        'id_transaksi_pengadaan','id_sparepart','jumlah','jumlah_datang',
        'harga_beli','harga_jual','sub_total'
     ];
     public function transaksi_pengadaan()
     {
         return $this->belongsTo(TransaksiPengadaan::class,'id_transaksi_pengadaan');
     }
     public function sparepart()
     {
         return $this->belongsTo(Sparepart::class,'id_sparepart');
     }
}
