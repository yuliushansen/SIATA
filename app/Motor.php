<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    public $incrementing = false;
    // field yang akan diisi
    protected $fillable = [
        'id_motor', 'id_pelanggan', 'merk_motor',
         'tipe_motor','nomor_polisi'
    ];
    public function detail_sparepart()
    {
        return $this->hasMany(DetailSparepart::class,'id_motor');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'id_pelanggan');
    }
    public function detail_motor()
    {
        return $this->hasMany(DetailMotor::class,'id_motor');
    }
}
