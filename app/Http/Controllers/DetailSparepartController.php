<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailSparepart;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class DetailSparepartController extends Controller
{
    //
    public function index()
    {
        return DetailSparepart::all();
    }
 
    public function show($id)
    {
        try{
            $detailSparepart = DetailSparepart::findorFail($id);
            return response()->json($detailSparepart,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_sparepart_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $detailSparepart = DetailSparepart::create([
                'id_sparepart'=>$data['id_sparepart'],
                'id_motor'=>$data['id_motor']
            ]);
            return response()->json($detailSparepart,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $detailSparepart = DetailSparepart::findOrFail($id);
            $detailSparepart->update([
                'id_sparepart'=>$data['id_sparepart'],
                'id_motor'=>$data['id_motor']
           ]);
           $detailSparepart->save();
            return response()->json($detailSparepart,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_sparepart_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $detailSparepart = DetailSparepart::findOrFail($id);
        $detailSparepart->delete();
        return response('detail sparepart berhasil di hapus');
    }
}
