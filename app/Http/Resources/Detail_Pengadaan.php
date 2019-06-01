<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Sparepart as SparepartResource;

class Detail_Pengadaan extends JsonResource
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
            'id_detail_pengadaan' => $this->id_detail_pengadaan,
            'id_transaksi_pengadaan' => $this->id_transaksi_pengadaan,
            'id_sparepart' => $this->id_sparepart,
            'jumlah' => $this->jumlah,
            'jumlah_datang' => $this->jumlah_datang,
            'harga_beli' => $this->harga_beli,
            'sub_total' => $this->sub_total,
            'harga_jual' => $this->harga_jual,
            'sparepart' => new SparepartResource($this->sparepart),
        ];
    }
}
