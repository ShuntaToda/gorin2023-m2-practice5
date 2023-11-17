<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(["middleware" => ["isActive", "noStore"]], function(){
    Route::get('/', function () {
        $users = User::get();
        return view('home', compact("users"));
    })->name("home");
    Route::get("logout", [LoginController::class, "logout"])->name("logout");
});


Route::get("login", [LoginController::class, "index"])->name("login");
Route::post("login", [LoginController::class, "login"]);

Route::group(["middleware" => ["auth", "can:admin"], "prefix" => "admin", "as" => "admin."], function(){
    Route::get("show/{id}", [AdminController::class, "show"])->name("show");
    Route::get("create", [AdminController::class, "create"])->name("create");
    Route::post("create", [AdminController::class, "store"]);
    
    Route::get("edit/{id}", [AdminController::class, "edit"])->name("edit");
    Route::put("edit/{id}", [AdminController::class, "update"]);
    
    Route::delete("delete/{id}", [AdminController::class, "delete"])->name("delete");
});

