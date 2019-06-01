<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSparepart extends Model
{
    protected $table = 'detail_sparepart';
    protected $primaryKey = 'id_detail_sparepart';
    //public $incrementing = false;   
    // field yang akan diisi
    protected $fillable = [
        'id_sparepart','id_motor'
     ];
     public function sparepart()
    {
        return $this->hasMany(Sparepart::class,'id_sparepart');
    }
    public function motor()
    {
        return $this->belongTo(Motor::class,'id_motor');
    }
}
