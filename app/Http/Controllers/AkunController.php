<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Resources\Akun as AkunResource;

/////enggak kepakai\\\\\\\
class AkunController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $akun = Akun::where('username','LIKE',"%$search%")->paginate(5);
        // return response()->json($akun, 200);
        return AkunResource::collection($akun);
    }
 
    public function show($id)
    {
        return Akun::find($id);
    }

    public function store(Request $request)
    {
        $users = new Akun;
        $users->id_pegawai = $request->id_pegawai;
        $users->username = $request->username;
        $users->password = bcrypt($request->password);
        if (Akun::where('id_pegawai', '=', $users->id_pegawai)->exists()) {
            return response()->json('Error Saving', 500);
        }else{
            $success = $users->save();
        }

        if(!$success){
            return response()->json('Error Saving', 500);
        }else{
            return response()->json('success', 201);
        }
    }

    public function update(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);
        $data = $request->all();
        if($request->password !== $akun->password){
            $password = bcrypt($data['password']);
        }
        else{
            $password = $akun->password;
        }
        try{
            $akun = Akun::findOrFail($id);
            $akun->update([
                    'id_pegawai'=>$data['id_pegawai'],
                    'username'=>$data['username'],
                    'password'=>$password
           ]);
           $akun->save();
            return response()->json($akun,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('Akun_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function delete($id)
    {
        $article = Akun::findOrFail($id);
        $article->delete();

        return 204;
    }
}
