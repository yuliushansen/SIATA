<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Jasa extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'nama_jasa', 'harga_jasa'
        return [
            'id_jasa' => $this->id_jasa,
            'nama_jasa' => $this->nama_jasa,
            'harga_jasa' => $this->harga_jasa,
        ];
    }
}
