<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ApiLoginController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post("auth/login", [ApiLoginController::class, "login"]);
Route::post("auth/create", function(Request $request){
    $request->validate([
            "name" => "required",
            "email" => "email|required",
            "password" => "required",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo ? $request->memo : "",
        ]);
    return response()->json("ok");
});

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::post("auth/logout", [ApiLoginController::class, "logout"]);

    Route::get("user", function(Request $request){
        return response()->json($request->user());
    });
    Route::put("user", function(Request $request){
        $request->validate([
            "name" => "required"
        ]);
        $user = User::find($request->user()->id);

        $user->update([
            "name" => $request->name,
            "memo" => $request->memo ? $request->memo : "",
        ]);
        return response()->json($request->user());
    });
    Route::delete("user", function(Request $request){
        $user = User::find($request->user()->id);

        $user->delete();
        return response()->json("deleted");
    });
});