<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sparepart;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class SparepartController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $sparepart = Sparepart::where('nama_sparepart','LIKE',"%$search%")->paginate();
        return response()->json($sparepart, 200);
    }

    public function getall()
    {
        return Sparepart::all();
    }
 
    public function byHargaDESC()
    {
        return Sparepart::orderBy('harga_jual', 'DESC')->get();
    }
    public function byHargaASC()
    {
        return Sparepart::orderBy('harga_jual', 'ASC')->get();
    }

    public function byStokDESC()
    {
        return Sparepart::orderBy('jumlah_sparepart', 'DESC')->get();
    }
    public function byStokASC()
    {
        return Sparepart::orderBy('jumlah_sparepart', 'ASC')->get();
    }
 
    public function show($id)
    {
        try{
            $sparepart = Sparepart::findorFail($id);
            return response()->json($sparepart,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('sparepart_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        $exploded = explode(',', $request->gambar);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg')){
            $ext = 'jpg';
        }else{
            $ext = 'png';
        }
        $fileName = str_random().'.'.$ext;
        $path = public_path().'/gambar'.'/'.$fileName;
        file_put_contents($path, $decoded);
        try{
            $sparepart = Sparepart::create([
                'kode_sparepart'=>$data['kode_sparepart'],
                'nama_sparepart'=>$data['nama_sparepart'],
                'merk_sparepart'=>$data['merk_sparepart'],
                'tipe_sparepart'=>$data['tipe_sparepart'],
                'lokasi_sparepart'=>$data['lokasi_sparepart'],
                'harga_jual'=>$data['harga_jual'],
                'satuan_sparepart'=>$data['satuan_sparepart'],
                'jumlah_sparepart'=>$data['jumlah_sparepart'],
                'gambar'=>$fileName,
                'minimal_stok'=>$data['minimal_stok']
            ]);
            return response()->json($sparepart,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
        $fileName = '';
        $sparepart = Sparepart::findOrFail($id);
        $data = $request->all();
        if (!is_null($request->gambar)) {
            if ($request->gambar === $sparepart->gambar || $request->gambar=== '') {
                $fileName = $request->gambar;
            }
            else {
                $exploded = explode(',', $request->gambar);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg')){
                    $ext = 'jpg';
                }else{
                    $ext = 'png';
                }
                $fileName = str_random().'.'.$ext;
                $path = public_path().'/gambar'.'/'.$fileName;
                file_put_contents($path, $decoded);
            }
        }
        
        
            
            $sparepart->update([
                'kode_sparepart'=>$request->kode_sparepart,
                'nama_sparepart'=>$request['nama_sparepart'],
                'merk_sparepart'=>$request['merk_sparepart'],
                'tipe_sparepart'=>$request['tipe_sparepart'],
                'lokasi_sparepart'=>$request['lokasi_sparepart'],
                'harga_jual'=>$request['harga_jual'],
                'satuan_sparepart'=>$request['satuan_sparepart'],
                'jumlah_sparepart'=>$request['jumlah_sparepart'],
                'gambar'=>$fileName,
                'minimal_stok'=>$request['minimal_stok']
           ]);
        
        $sparepart->save();
        return response()->json($sparepart,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('sparepart_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $sparepart = Sparepart::findOrFail($id);
        $sparepart->delete();
        return response('sparepart berhasil di hapus');
    }

}
