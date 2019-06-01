<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPengadaan;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;
use App\Http\Resources\Transaksi_Pengadaan as PengadaanResource;

class TransaksiPengadaanController extends Controller
{
    //
    public function index(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksiPengadaan = TransaksiPengadaan::where('id_transaksi_pengadaan','LIKE',"%$search%")->paginate(5);
        // return response()->json($akun, 200);
        return PengadaanResource::collection($transaksiPengadaan);
    }
    public function NonSelesai(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksiPengadaan = TransaksiPengadaan::where('id_transaksi_pengadaan','LIKE',"%$search%")->where('status_pengadaan','!=',"Selesai")->orderBy('tanggal', 'DESC')->paginate(5);
        // return response()->json($akun, 200);
        return PengadaanResource::collection($transaksiPengadaan);
    }
    public function Selesai(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksiPengadaan = TransaksiPengadaan::where('id_transaksi_pengadaan','LIKE',"%$search%")->where('status_pengadaan','=',"Selesai")->orderBy('tanggal', 'DESC')->paginate(5);
        // return response()->json($akun, 200);
        return PengadaanResource::collection($transaksiPengadaan);
    }

    public function getLatest(){
        $transaksiPengadaan = TransaksiPengadaan::latest()->first();
        return response()->json($transaksiPengadaan,200);
    }

    public function showLengkap($id)
    {
        try{
            $transaksi = TransaksiPengadaan::findorFail($id);
            return new PengadaanResource($transaksi);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }
 
    public function show($id)
    {
        try{
            $transaksiPengadaan = TransaksiPengadaan::findorFail($id);
            return response()->json($transaksiPengadaan,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_pengadaan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $transaksiPengadaan = TransaksiPengadaan::create([
                'id_cs'=>$data['id_cs'],
                'id_supplier'=>$data['id_supplier'],
                'tanggal'=>$data['tanggal'],
                'status_pengadaan'=>$data['status_pengadaan'],
                'total_harga'=>$data['total_harga']
            ]);
            return response()->json($transaksiPengadaan,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $transaksiPengadaan = TransaksiPengadaan::findOrFail($id);
            $transaksiPengadaan->update([
                'id_cs'=>$data['id_cs'],
                'id_supplier'=>$data['id_supplier'],
                'tanggal'=>$data['tanggal'],
                'status_pengadaan'=>$data['status_pengadaan'],
                'total_harga'=>$data['total_harga']
           ]);
           $transaksiPengadaan->save();
            return response()->json($transaksiPengadaan,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_pengadaan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $transaksiPengadaan = TransaksiPengadaan::findOrFail($id);
        $transaksiPengadaan->delete();
        return response('transaksi pengadaan berhasil di hapus');
    }
}
