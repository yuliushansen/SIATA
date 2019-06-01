<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    // field yang akan diisi
    protected $fillable = [
        'id_cabang', 'id_kasir','id_cs',
        'id_pelanggan','jenis_transaksi',
        'tanggal','status_transaksi','total_harga'
    ];
    public function transaksi_service()
    {
        return $this->hasMany(TransaksiService::class,'id_transaksi');
    }
    public function transaksi_penjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class,'id_transaksi');
    }
    //////KEMUNGKINAN DIGANTI\\\\\\\\
    public function pegawai_kasir()
    {
        return $this->belongsTo(Pegawai::class,'id_cs');
    }
    public function pegawai_cs()
    {
        return $this->belongsTo(Pegawai::class,'id_kasir');
    }
    ////////////////\\\\\\\\\\\\\\\\\\\\\
    public function cabang()
    {
        return $this->belongsTo(Cabang::class,'id_cabang');
    }
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class,'id_transaksi');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'id_pelanggan');
    }
    public function detail_motor()
    {
        return $this->hasMany(DetailMotor::class,'id_transaksi');
    }
}
