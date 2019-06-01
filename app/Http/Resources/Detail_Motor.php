<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Motor as MotorResource;

class Detail_Motor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'id_motor','id_transaksi'
        return [
            'id_motor' => $this->id_motor,
            'id_detail' => $this->id_detail,
            'id_transaksi' => $this->id_transaksi,
            'motor' => new MotorResource($this->motor),
        ];
    }
}
