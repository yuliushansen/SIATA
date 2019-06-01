<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pelanggan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //'nama_pelanggan', 'nomor_pelanggan','alamat_pelanggan'
        return [
            'id_pelanggan' => $this->id_pelanggan,
            'nama_pelanggan' => $this->nama_pelanggan,
            'nomor_pelanggan' => $this->nomor_pelanggan,
            'alamat_pelanggan' => $this->alamat_pelanggan,
        ];
    }
}
