<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPengadaan;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class DetailPengadaanController extends Controller
{
    //
    public function index()
    {
        return DetailPengadaan::all();
    }
 
    public function show($id)
    {
        try{
            $detailPengadaan = DetailPengadaan::findorFail($id);
            return response()->json($detailPengadaan,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_pengadaan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $detailPengadaan = DetailPengadaan::create([
                'id_transaksi_pengadaan'=>$data['id_transaksi_pengadaan'],
                'id_sparepart'=>$data['id_sparepart'],
                'jumlah'=>$data['jumlah'],
                'jumlah_datang'=>$data['jumlah_datang'],
                'harga_beli'=>$data['harga_beli'],
                'harga_jual'=>$data['harga_jual'],
                'sub_total'=>$data['sub_total']
            ]);
            return response()->json($detailPengadaan,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $detailPengadaan = DetailPengadaan::findOrFail($id);
            $detailPengadaan->update([
                'id_transaksi_pengadaan'=>$data['id_transaksi_pengadaan'],
                'id_sparepart'=>$data['id_sparepart'],
                'jumlah'=>$data['jumlah'],
                'jumlah_datang'=>$data['jumlah_datang'],
                'harga_beli'=>$data['harga_beli'],
                'harga_jual'=>$data['harga_jual'],
                'sub_total'=>$data['sub_total']
           ]);
           $detailPengadaan->save();
            return response()->json($detailPengadaan,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_pengadaan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $detailPengadaan = DetailPengadaan::findOrFail($id);
        $detailPengadaan->delete();
        return response('detail pengadaan berhasil di hapus');
    }
}
