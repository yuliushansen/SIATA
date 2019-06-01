<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cabang extends JsonResource
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
            'id_cabang' => $this->id_cabang,
            'nama_cabang' => $this->nama_cabang,
            'alamat' => $this->alamat,
            'nomor' => $this->nomor,
        ];
    }
}
