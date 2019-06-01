<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pelanggan as PelangganResource;

class Motor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'id_motor', 'id_pelanggan', 'merk_motor',
        //  'tipe_motor','nomor_polisi'
        return [
            'id_motor' => $this->id_motor,
            'id_pelanggan' => $this->id_pelanggan,
            'merk_motor' => $this->merk_motor,
            'tipe_motor' => $this->tipe_motor,
            'nomor_polisi' => $this->nomor_polisi,
            'pelanggan' => new PelangganResource($this->pelanggan),
        ];
    }
}
