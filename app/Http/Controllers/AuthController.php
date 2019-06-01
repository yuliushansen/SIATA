<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Http\Request;
use App\Akun;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 400);
        }
        return response([
                'status' => 'success'
            ])
            ->header('Authorization', $token);
    }
    public function user(Request $request)
    {
        $user = Akun::find(Auth::user()->id_akun);
        return response([
                'status' => 'success',
                'data' => $user
                
            ]);
    }
    public function refresh()
    {
        return response([
                'status' => 'success'
            ]);
    }

    public function logout()
{
    JWTAuth::invalidate();
    return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
}
}
