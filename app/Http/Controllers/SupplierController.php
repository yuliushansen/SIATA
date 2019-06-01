<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $supplier = Supplier::where('nama_supplier','LIKE',"%$search%")->paginate(5);
        return response()->json($supplier, 200);
    }
    public function getAll()
    {
        return Supplier::all();
    }
 
    public function show($id)
    {
        try{
            $supplier = Supplier::findorFail($id);
            return response()->json($supplier,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('supplier_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $supplier = Supplier::create([
                'nama_supplier'=>$data['nama_supplier'],
                'nama_sales'=>$data['nama_sales'],
                'nomor_sales'=>$data['nomor_sales'],
                'alamat'=>$data['alamat']
            ]);
            return response()->json($supplier,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $supplier = Supplier::findOrFail($id);
            $supplier->update([
                'nama_supplier'=>$data['nama_supplier'],
                'nama_sales'=>$data['nama_sales'],
                'nomor_sales'=>$data['nomor_sales'],
                'alamat'=>$data['alamat']
           ]);
           $supplier->save();
            return response()->json($supplier,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('supplier_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        // $id_del=$id;
        // $supplier = Supplier::findOrFail($id);
        // $supplier->delete();
        // return response('supplier berhasil di hapus');
        $article = Supplier::findOrFail($id);
        $article->delete();

        return 204;
    }
}
