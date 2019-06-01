<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Detail_Motor as DetailResource;
use App\Http\Resources\Sparepart as SparepartResource;

class Transaksi_Penjualan extends JsonResource
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
            'id_transaksi_penjualan' => $this->id_transaksi_penjualan,
            'id_sparepart' => $this->id_sparepart,
            'id_detail' => $this->id_detail,
            'id_transaksi' => $this->id_transaksi,
            'sub_total' => $this->sub_total,
            'jumlah_sparepart' => $this->jumlah_sparepart,
            'detail' => new DetailResource($this->detail_motor),
            'sparepart' => new SparepartResource($this->sparepart),
        ];
    }
}
