<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pegawai as PegawaiResource;
use App\Http\Resources\Pelanggan as PelangganResource;
use App\Http\Resources\Cabang as CabangResource;
use App\Http\Resources\Transaksi_Service as ServiceResource;
use App\Http\Resources\Transaksi_Penjualan as PenjualanResource;

class Transaksi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // id_cabang', 'id_kasir','id_cs',
        // 'id_pelanggan','jenis_transaksi',
        // 'tanggal','status_transaksi','total_harga'
        return [
            'id_transaksi' => $this->id_transaksi,
            'id_cabang' => $this->id_cabang,
            'id_kasir' => $this->id_kasir,
            'id_cs' => $this->id_cs,
            'id_pelanggan' => $this->id_pelanggan,
            'jenis_transaksi' => $this->jenis_transaksi,
            'tanggal' => $this->tanggal,
            'status_transaksi' => $this->status_transaksi,
            'total_harga' => $this->total_harga,
            'kasir' => new PegawaiResource($this->pegawai_kasir),
            'cs' => new PegawaiResource($this->pegawai_cs),
            'cabang' => new CabangResource($this->cabang),
            'pelanggan' => new PelangganResource($this->pelanggan),
            'service' =>  ServiceResource::collection($this->transaksi_service),
            'penjualan' =>  PenjualanResource::collection($this->transaksi_penjualan),
        ];
    }
}
