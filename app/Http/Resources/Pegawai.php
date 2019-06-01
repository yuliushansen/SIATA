<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cabang as CabangResource;

class Pegawai extends JsonResource
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
            'id_pegawai' => $this->id_pegawai,
            'id_cabang' => $this->id_cabang,
            'nama' => $this->nama,
            'role' => $this->role,
            'alamat' => $this->alamat,
            'nomor' => $this->nomor,
            'gaji' => $this->gaji,
            'cabang' => new CabangResource($this->cabang),
        ];
    }
}
