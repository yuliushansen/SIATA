<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'sparepart';
    protected $primaryKey = 'id_sparepart';
    // field yang akan diisi
    protected $fillable = [
        'kode_sparepart','nama_sparepart','merk_sparepart',
        'tipe_sparepart','lokasi_sparepart','harga_jual',
        'satuan_sparepart','jumlah_sparepart','gambar',
        'minimal_stok'
     ];
     public function detail_sparepart()
    {
        return $this->belongTo(DetailSparepart::class,'id_sparepart');
    }
    public function transaksi_penjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class,'id_sparepart');
    }
    public function detail_pengadaan()
    {
        return $this->hasMany(DetailPengadaan::class,'id_sparepart');
    }   
}
