<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JasaService;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class JasaServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $jasa = JasaService::where('nama_jasa','LIKE',"%$search%")->paginate();
        return response()->json($jasa, 200);
    }

    public function getall()
    {
        return JasaService::all();
    }
 
    public function show($id)
    {
        try{
            $jasaService = JasaService::findorFail($id);
            return response()->json($jasaService,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('jasa_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $jasaService = JasaService::create([
                'nama_jasa'=>$data['nama_jasa'],
                'harga_jasa'=>$data['harga_jasa']
            ]);
            return response()->json($jasaService,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $jasaService = JasaService::findOrFail($id);
            $jasaService->update([
                    'nama_jasa'=>$data['nama_jasa'],
                    'harga_jasa'=>$data['harga_jasa']
           ]);
           $jasaService->save();
            return response()->json($jasaService,201);
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
        $jasaService = JasaService::findOrFail($id);
        $jasaService->delete();
        return response('jasa service berhasil di hapus');
    }
}
