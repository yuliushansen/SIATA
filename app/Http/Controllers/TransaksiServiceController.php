<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiService;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;
use App\Http\Resources\Transaksi_Service as TransaksiServiceResource;

class TransaksiServiceController extends Controller
{
    //
    public function index()
    {
        return TransaksiService::all();
    }
    
    public function servicebymotor(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksi = TransaksiService::whereHas('detail_motor', function ($query) use ($search) {
                $query->whereHas('motor', function ($query) use ($search) {
                    $query->where('nomor_polisi', 'like', '%'.$search.'%');
                });
            })->orderBy('id_transaksi_service', 'DESC')->get();
        // return response()->json($akun, 200);
        return TransaksiServiceResource::collection($transaksi);
    }

    public function getLast(){
        $transaksi = TransaksiService::latest()->first();
        return response()->json($transaksi,200);
    }

    public function show($id)
    {
        try{
            $transaksiService = TransaksiService::findorFail($id);
            return response()->json($transaksiService,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_service_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $transaksiService = TransaksiService::create([
                'id_detail'=>$data['id_detail'],
                'id_jasa'=>$data['id_jasa'],
                'id_montir'=>$data['id_montir'],
                'id_transaksi'=>$data['id_transaksi'],
                'sub_total'=>$data['sub_total'],
                'jumlah_jasa'=>$data['jumlah_jasa'],
                'status_service'=>$data['status_service']
            ]);
            return response()->json($transaksiService,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }
    public function storebaru(Request $request)
    {
        $data = $request->all();
        $detail = $data['id_detail'];
        try{
            $transaksiService = TransaksiService::create([
                'id_detail'=>$detail['id_detail'],
                'id_jasa'=>$data['id_jasa'],
                'id_montir'=>$data['id_montir'],
                'id_transaksi'=>$data['id_transaksi'],
                'sub_total'=>$data['sub_total'],
                'jumlah_jasa'=>$data['jumlah_jasa'],
                'status_service'=>$data['status_service']
            ]);
            return response()->json($transaksiService,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $transaksiService = TransaksiService::findOrFail($id);
            $transaksiService->update([
                'id_detail'=>$data['id_detail'],
                'id_jasa'=>$data['id_jasa'],
                'id_montir'=>$data['id_montir'],
                'id_transaksi'=>$data['id_transaksi'],
                'sub_total'=>$data['sub_total'],
                'jumlah_jasa'=>$data['jumlah_jasa'],
                'status_service'=>$data['status_service']
           ]);
           $transaksiService->save();
            return response()->json($transaksiService,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_service_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $transaksiService = TransaksiService::findOrFail($id);
        $transaksiService->delete();
        return response('transaksi service berhasil di hapus');
    }
}
