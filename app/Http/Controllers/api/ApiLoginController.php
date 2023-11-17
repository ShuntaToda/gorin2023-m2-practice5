<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $check = $request->only(["name", "password"]);

        if(Auth::attempt($check)){
            $request->session()->regenerate();
            $token = $request->user()->createToken("token")->plainTextToken;
            return response()->json($token);
        }
        return response()->json("error"); 
    }
    public function logout(Request $request){
        $request->user()->tokens->delete();
        Auth::logout();
        $request->session()->flush();
        return response()->json("logout");
    }
}
