<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;
use App\Http\Resources\Pegawai as PegawaiResource;

class PegawaiController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $pegawai = Pegawai::where('nama','LIKE',"%$search%")->paginate(5);
        //return response()->json($pegawai, 200);
        return PegawaiResource::collection($pegawai);
    }

    public function getAll()
    {
        return Pegawai::all();
    }
    
    public function show($id)
    {
        // try{
        //     $pegawai = Pegawai::findorFail($id);
        //     return response()->json($pegawai,200);
        // }
        // catch(ModelNotFoundException $e){
        //     return $this->sendNotFoundResponse('pegawai_tidak_ada');

        // }
        // catch(Exception $e){
        //     return $this->sendIseResponse($e->getMessage());
        // }
        
        $pegawai = Pegawai::findorFail($id);
        return new PegawaiResource($pegawai);
     }
     public function showbyRole($id)
    {
        // try{
        //     $pegawai = Pegawai::findorFail($id);
        //     return response()->json($pegawai,200);
        // }
        // catch(ModelNotFoundException $e){
        //     return $this->sendNotFoundResponse('pegawai_tidak_ada');

        // }
        // catch(Exception $e){
        //     return $this->sendIseResponse($e->getMessage());
        // }
        
        $pegawai = Pegawai::where('role','LIKE',"$id")->get();
        return PegawaiResource::collection($pegawai);
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $pegawai = Pegawai::create([
                'id_cabang'=>$data['id_cabang'],
                'nama'=>$data['nama'],
                'role'=>$data['role'],
                'alamat'=>$data['alamat'],
                'nomor'=>$data['nomor'],
                'gaji'=>$data['gaji']
            ]);
            return response()->json($pegawai,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->update([
                'id_cabang'=>$data['id_cabang'],
                'nama'=>$data['nama'],
                'role'=>$data['role'],
                'alamat'=>$data['alamat'],
                'nomor'=>$data['nomor'],
                'gaji'=>$data['gaji']
           ]);
           $pegawai->save();
            return response()->json($pegawai,201);
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
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return response('pegawai berhasil di hapus');
    }
}
