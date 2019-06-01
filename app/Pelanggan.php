<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    // field yang akan diisi
    protected $fillable = [
        'nama_pelanggan', 'nomor_pelanggan','alamat_pelanggan'
    ];
    public function motor()
    {
        return $this->hasMany(Motor::class,'id_pelanggan');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class,'id_pelanggan');
    }
}
