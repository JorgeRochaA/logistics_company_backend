<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(UserRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(["error" => "Wrong Credentials"], 401);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response()->json([
            "user" => Auth::user(),
            "access_token" => $accessToken,
        ], 200);
    }

    public function logOut(Request $request)
    {
        $token = $request->user()->token();

        $token->revoke();

        return response()->json([
            "message" => "You have successfully closed the session."
        ], 200);
    }
}
