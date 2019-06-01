<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    protected $table = 'transaksi_penjualan';
    protected $primaryKey = 'id_transaksi_penjualan';
    // field yang akan diisi
    protected $fillable = [
        'id_sparepart','id_detail','id_transaksi',
        'sub_total','jumlah_sparepart'
     ];
     public function sparepart()
    {
        return $this->belongsTo(sparepart::class,'id_sparepart');
    }
    public function detail_motor()
    {
        return $this->belongsTo(DetailMotor::class,'id_detail');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');
    }
}
