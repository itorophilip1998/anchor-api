<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function login()
    {
        try {

            $credentials = request()->only('email', 'password');
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }



    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
