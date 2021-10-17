<?php

namespace App\Http\Controllers\Auth\Jwt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 422);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        return response()->json(compact('token'));
    }
}
