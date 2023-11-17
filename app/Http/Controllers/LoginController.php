<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(Request $request){
        return view("login");
    }
    public function login(Request $request){
        $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $check = $request->only(["name", "password"]);

        if(Auth::attempt($check)){
            $request->session()->regenerate();
            return redirect(route("home"));
        }
        return redirect(route("login"))->with(["message" => "入力に間違いがあります"]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect(route("login"));
    }
}
