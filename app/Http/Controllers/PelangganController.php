<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class PelangganController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $pelanggan = Pelanggan::where('nama_pelanggan','LIKE',"%$search%")->paginate(5);
        return response()->json($pelanggan, 200);
        //return PegawaiResource::collection($pelanggan);
    }
    public function getAll()
    {
        return Pelanggan::all();
    }
    public function show($id)
    {
        try{
            $pelanggan = Pelanggan::findorFail($id);
            return response()->json($pelanggan,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('pelanggan_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $pelanggan = Pelanggan::create([
                'nama_pelanggan'=>$data['nama_pelanggan'],
                'nomor_pelanggan'=>$data['nomor_pelanggan'],
                'alamat_pelanggan'=>$data['alamat_pelanggan']
            ]);
            return response()->json($pelanggan,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->update([
                'nama_pelanggan'=>$data['nama_pelanggan'],
                'nomor_pelanggan'=>$data['nomor_pelanggan'],
                'alamat_pelanggan'=>$data['alamat_pelanggan']
           ]);
           $pelanggan->save();
            return response()->json($pelanggan,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('cabang_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return response('pelanggan berhasil di hapus');
    }
}
