<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    // field yang akan diisi
    protected $fillable = [
        'nama_supplier','nama_sales',
        'nomor_sales','alamat'
    ];
    public function transaksi_pengadaan()
    {
        return $this->belongTo(TransaksiPengadaan::class,'id_supplier');
    }
}
