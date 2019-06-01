<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
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
            'id_supplier' => $this->id_supplier,
            'nama_supplier' => $this->nama_supplier,
            'nama_sales' => $this->nama_sales,
            'nomor_sales' => $this->nomor_sales,
            'alamat' => $this->alamat,
        ];
    }
}
