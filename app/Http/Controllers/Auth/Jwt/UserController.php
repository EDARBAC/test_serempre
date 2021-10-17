<?php

namespace App\Http\Controllers\Auth\Jwt;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;

class UserController extends Controller
{
    public function show()
    {
        $user = JWTAuth::parseToken()->authenticate();

        return response()->json($user);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','string','max:255']
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors(), 'message' => 'The given data was invalid']);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $user->name = $request->name;

        return response(['status' => $user->save(), 'user' => $user]);
    }
}
