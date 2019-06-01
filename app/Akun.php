<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Akun extends Authenticatable
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    // field yang akan diisi
    protected $fillable = [
        'id_pegawai','username','password'
    ];
    // protected $hidden = [
    //     'password'
    // ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_pegawai');
    }
    
}
