<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sparepart extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'kode_sparepart','nama_sparepart','merk_sparepart',
        // 'tipe_sparepart','lokasi_sparepart','harga_jual',
        // 'satuan_sparepart','jumlah_sparepart','gambar',
        // 'minimal_stok'
        return [
            'id_sparepart' => $this->id_sparepart,
            'kode_sparepart' => $this->kode_sparepart,
            'nama_sparepart' => $this->nama_sparepart,
            'merk_sparepart' => $this->merk_sparepart,
            'tipe_sparepart' => $this->tipe_sparepart,
            'lokasi_sparepart' => $this->lokasi_sparepart,
            'harga_jual' => $this->harga_jual,
            'satuan_sparepart' => $this->satuan_sparepart,
            'jumlah_sparepart' => $this->jumlah_sparepart,
            'gambar' => $this->gambar,
            'minimal_stok' => $this->minimal_stok,
            
        ];
    }
}
