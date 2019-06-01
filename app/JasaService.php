<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasaService extends Model
{
    protected $table = 'jasa_service';
    protected $primaryKey = 'id_jasa';
    // field yang akan diisi
    protected $fillable = [
        'nama_jasa', 'harga_jasa'
    ];
    

    public function transaksi_service()
    {
        return $this->hasMany(TransaksiService::class,'id_jasa');
    }
}
