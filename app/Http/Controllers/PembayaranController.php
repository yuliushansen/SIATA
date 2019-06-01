<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class PembayaranController extends Controller
{
    //
    public function index()
    {
        return Pembayaran::all();
    }
 
    public function show($id)
    {
        try{
            $pembayaran = Pembayaran::where('id_transaksi','=',$id)->get();
            return response()->json($pembayaran,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('pembayaran_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $pembayaran = Pembayaran::create([
                'id_transaksi'=>$data['id_transaksi'],
                'discount'=>$data['discount'],
                'kembalian'=>$data['kembalian'],
                'jumlah_uang'=>$data['jumlah_uang']
            ]);
            return response()->json($pembayaran,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->update([
                'id_transaksi'=>$data['id_transaksi'],
                'discount'=>$data['discount'],
                'kembalian'=>$data['kembalian'],
                'jumlah_uang'=>$data['jumlah_uang']
           ]);
           $pembayaran->save();
            return response()->json($pembayaran,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('pembayaran_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return response('pembayaran berhasil di hapus');
    }
}
