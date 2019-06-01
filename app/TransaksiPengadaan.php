<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPengadaan extends Model
{
    protected $table = 'transaksi_pengadaan';
    protected $primaryKey = 'id_transaksi_pengadaan';
    // field yang akan diisi
    protected $fillable = [
        'id_cs', 'id_supplier',
        'tanggal','status_pengadaan',
        'total_harga'
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier');
    }
    public function detail_pengadaan()
    {
        return $this->hasMany(DetailPengadaan::class,'id_transaksi_pengadaan');
    }
    //////KEMUNGKINAN DIGANTI\\\\\\\\
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_cs');
    }
}
