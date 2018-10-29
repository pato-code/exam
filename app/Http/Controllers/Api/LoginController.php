<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $credinational = $request->only('email','password');
        JWTAuth::attempt($credinational);
        $user=JWTAuth::user();
        $user =  JWTAuth::fromUser($user);

        $group = JWTAuth::user()->group->name;
        $data = [
          "token" => $user,
           "group" => $group
        ];
        return response()->json(
            [
            "data" => $data
        ],200);
    }
}
