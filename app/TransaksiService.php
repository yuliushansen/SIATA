<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiService extends Model
{
    protected $table = 'transaksi_service';
    protected $primaryKey = 'id_transaksi_service';
    // field yang akan diisi
    protected $fillable = [
        'id_detail','id_jasa','id_montir',
        'id_transaksi','sub_total','jumlah_jasa',
        'status_service'
     ];

     public function jasa_service()
    {
        return $this->belongsTo(JasaService::class,'id_jasa');
    }
    public function detail_motor()
    {
        return $this->belongsTo(DetailMotor::class,'id_detail');
    }
    //////KEMUNGKINAN DIUBAH\\\\\\\
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_montir');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');
    }
}
