<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pegawai as PegawaiResource;

class Akun extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_akun' => $this->id_akun,
            'id_pegawai' => $this->id_pegawai,
            'username' => $this->username,
            'password' => $this->password,
            'pegawai' => new PegawaiResource($this->pegawai),
        ];
    }
}
