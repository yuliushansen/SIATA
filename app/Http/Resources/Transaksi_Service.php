<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Pegawai as PegawaiResource;
use App\Http\Resources\Detail_Motor as DetailResource;
use App\Http\Resources\Jasa as JasaResource;
use App\Http\Resources\Transaksi as TransaksiResource;

class Transaksi_Service extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'id_detail','id_jasa','id_montir',
        // 'id_transaksi','sub_total','jumlah_jasa',
        // 'status_service'
        return [
            'id_transaksi_service' => $this->id_transaksi_service,
            'id_jasa' => $this->id_jasa,
            'id_detail' => $this->id_detail,
            'id_transaksi' => $this->id_transaksi,
            'id_montir' => $this->id_montir,
            'sub_total' => $this->sub_total,
            'jumlah_jasa' => $this->jumlah_jasa,
            'status_service' => $this->status_service,
            'montir' => new PegawaiResource($this->pegawai),
            'detail' => new DetailResource($this->detail_motor),
            'jasa' => new JasaResource($this->jasa_service),
        ];
    }
}
