<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    // field yang akan diisi
    protected $fillable = [
       'id_transaksi','discount',
       'kembalian','jumlah_uang'
    ];
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class,'id_transaksi');
    }
}
