<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", [\App\Http\Controllers\UserController::class, "main"])->name("main");

Route::middleware("user")->group(function () {
    Route::get("user", [\App\Http\Controllers\CallsController::class, "user"])->name("user");
    Route::get("call/form", [\App\Http\Controllers\CallsController::class, "showCall"])->name("call");
    Route::post("call/create", [\App\Http\Controllers\CallsController::class, "create"])->name("call.send");
    Route::get("call/{id}/delete", [\App\Http\Controllers\CallsController::class, "delete"])->name("call.delete");

    Route::middleware("admin")->group(function () {
        Route::get("groom", [\App\Http\Controllers\CallsController::class, "showAdmin"])->name("admin");
        Route::post("groom/{id}/change", [\App\Http\Controllers\CallsController::class, "changeStatus"])->name("change-status");
    });
});

Route::get("login/form", [\App\Http\Controllers\UserController::class, "showLogin"])->name("login");
Route::get("register/form", [\App\Http\Controllers\UserController::class, "showRegister"])->name("register");
Route::post("login", [\App\Http\Controllers\UserController::class, "login"])->name("login.send");
Route::post("register", [\App\Http\Controllers\UserController::class, "register"])->name("register.send");
Route::get("logout", [\App\Http\Controllers\UserController::class, "logout"])->name("logout");
