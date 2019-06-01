<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pegawai as PegawaiResource;
use App\Http\Resources\Supplier as SupplierResource;
use App\Http\Resources\Detail_Pengadaan as PengadaanResource;

class Transaksi_Pengadaan extends JsonResource
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
            'id_transaksi_pengadaan' => $this->id_transaksi_pengadaan,
            'id_cs' => $this->id_cs,
            'id_supplier' => $this->id_supplier,
            'tanggal' => $this->tanggal,
            'status_pengadaan' => $this->status_pengadaan,
            'total_harga' => $this->total_harga,
            'cs' => new PegawaiResource($this->pegawai),
            'supplier' => new SupplierResource($this->supplier),
            'pengadaan' =>  PengadaanResource::collection($this->detail_pengadaan),
        ];
    }
}
