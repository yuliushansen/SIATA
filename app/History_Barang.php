<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_Barang extends Model
{
    protected $table = 'history_barang';
    protected $primaryKey = 'id_history';
    // field yang akan diisi
    protected $fillable = [
        'id_sparepart', 'tanggal',
        'jumlah_masuk', 'jumlah_keluar'
    ];
}
