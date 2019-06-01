<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Http\Resources\Motor as MotorResource;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class MotorController extends Controller
{
    //
    public function index()
    {
        return Motor::all();
    }
    public function getindex(Request $request)
    {
        $search = $request->search;
        $jasa = Motor::where('nomor_polisi','LIKE',"%$search%")->paginate(5);
        return MotorResource::collection($jasa);
    }

    public function getMotorPelanggan($id)
    {
        try{
            $motor = Motor::where('id_pelanggan','LIKE',"%$id%")->paginate();
            return response()->json($motor,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('motor_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }
 
    public function show($id)
    {
        try{
            $motor = Motor::findorFail($id);
            return response()->json($motor,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('motor_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $motor = Motor::create([
                'id_motor'=>$data['id_motor'],
                'id_pelanggan'=>$data['id_pelanggan'],
                'merk_motor'=>$data['merk_motor'],
                'tipe_motor'=>$data['tipe_motor'],
                'nomor_polisi'=>$data['nomor_polisi']
            ]);
            return response()->json($motor,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $motor = Motor::findOrFail($id);
            $motor->update([
                'id_motor'=>$data['id_motor'],
                'id_pelanggan'=>$data['id_pelanggan'],
                'merk_motor'=>$data['merk_motor'],
                'tipe_motor'=>$data['tipe_motor'],
                'nomor_polisi'=>$data['nomor_polisi']
           ]);
           $motor->save();
            return response()->json($motor,201);
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
        $motor = Motor::findOrFail($id);
        $motor->delete();
        return response('motor berhasil di hapus');
    }
}
