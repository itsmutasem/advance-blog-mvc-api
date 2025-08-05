<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = auth('api')->attempt($credentials);
        if (!$token)
        {
            return response(['message' => 'Unauthorized access!'], 401);
        }
        return response([
            'access_token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
