<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailMotor;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class DetailMotorController extends Controller
{
    //
    public function index()
    {
        return DetailMotor::all();
    }
    
    public function getLast(){
        $transaksi = DetailMotor::latest()->first();
        return response()->json($transaksi,200);
    }

    public function getdetail($transaksi,$motor)
    {
        try{
            $matchThese = ['id_motor' => $motor,'id_transaksi' => $transaksi];
            $detailMotor = DetailMotor::where($matchThese)->get();
            
            return response()->json($detailMotor,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_motor_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function show($id)
    {
        
            $detailMotor = DetailMotor::find($id);
            if(is_null($detailMotor)){
                return response()->json('Not Found',404);
            }else{
                return response()->json($detailMotor,200);
            }
        
     }

     public function post($transaksi,$motor)
     {
         try{
             $detailMotor = DetailMotor::create([
                 'id_motor'=>$motor,
                 'id_transaksi'=>$transaksi
             ]);
             return response()->json($detailMotor,201);
         }
         catch(Exception $e){
             return $this->sendIseResponse($e->getMessage());
         }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $detailMotor = DetailMotor::create([
                'id_motor'=>$data['id_motor'],
                'id_transaksi'=>$data['id_transaksi']
            ]);
            return response()->json($detailMotor,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $detailMotor = DetailMotor::findOrFail($id);
            $detailMotor->update([
                'id_motor'=>$data['id_motor'],
                'id_transaksi'=>$data['id_transaksi']
           ]);
           $detailMotor->save();
            return response()->json($detailMotor,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('detail_motor_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $detailMotor = DetailMotor::where('id_transaksi','=',"$id")->delete();
        return response('detail motor berhasil di hapus');
    }
}
