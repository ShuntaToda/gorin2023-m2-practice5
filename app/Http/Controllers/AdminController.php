<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view("showUser", compact("user"));
    }

    public function create(){
        return view("createUser");
    }
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "email|required",
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo ? $request->memo : "",
        ]);

        return redirect(route("admin.create"))->with(["message" => "登録完了しました"]);
    }

    public function edit($id){
        $user = User::find($id);
        return view("editUser", compact("user"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "email" => "email|required",
        ]);

        $user = User::find($id);

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "memo" => $request->memo ? $request->memo : "",
            "is_active" => $request->is_active == "on" ? true : false,
        ]);

        return redirect(route("admin.edit", $user->id))->with(["message" => "更新完了しました"]);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect(route("home"))->with(["message" => "削除完了しました"]);
    }
}
