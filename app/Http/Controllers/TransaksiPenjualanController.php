<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPenjualan;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class TransaksiPenjualanController extends Controller
{
    //
    public function index()
    {
        return TransaksiPenjualan::all();
    }

    public function getLast(){
        $transaksi = TransaksiPenjualan::latest()->first();
        return response()->json($transaksi,200);
    }
 
    public function show($id)
    {
        try{
            $transaksiPenjualan = TransaksiPenjualan::findorFail($id);
            return response()->json($transaksiPenjualan,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_penjualan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $transaksiPenjualan = TransaksiPenjualan::create([
                'id_sparepart'=>$data['id_sparepart'],
                'id_detail'=>$data['id_detail'],
                'id_transaksi'=>$data['id_transaksi'],
                'sub_total'=>$data['sub_total'],
                'jumlah_sparepart'=>$data['jumlah_sparepart']
            ]);
            return response()->json($transaksiPenjualan,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
            $transaksiPenjualan->update([
                'id_sparepart'=>$data['id_sparepart'],
                'id_detail'=>$data['id_detail'],
                'id_transaksi'=>$data['id_transaksi'],
                'sub_total'=>$data['sub_total'],
                'jumlah_sparepart'=>$data['jumlah_sparepart']
           ]);
           $transaksiPenjualan->save();
            return response()->json($transaksiPenjualan,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_penjualan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        $transaksiPenjualan->delete();
        return response('transaksi penjualan berhasil di hapus');
    }
}
