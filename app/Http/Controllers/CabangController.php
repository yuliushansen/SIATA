<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabang;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class CabangController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $cabang = Cabang::where('nama_cabang','LIKE',"%$search%")->paginate(5);
        return response()->json($cabang, 200);
    }

    public function getAll()
    {
        return Cabang::all();
    }
 
    public function show($id)
    {
        try{
            $cabang = Cabang::findorFail($id);
            return response()->json($cabang,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('cabang_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $cabang = Cabang::create([
                'nama_cabang'=>$data['nama_cabang'],
                'alamat'=>$data['alamat'],
                'nomor'=>$data['nomor']
            ]);
            return response()->json($cabang,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $cabang = Cabang::findOrFail($id);
            $cabang->update([
                    'nama_cabang'=>$data['nama_cabang'],
                    'alamat'=>$data['alamat'],
                 'nomor'=>$data['nomor']
           ]);
           $cabang->save();
            return response()->json($cabang,201);
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
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();
        return response('cabang berhasil di hapus');
    }
}
