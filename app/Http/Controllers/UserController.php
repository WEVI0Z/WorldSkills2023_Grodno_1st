<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function main() {
        $title = "Главная";

        $calls = Call::query()->orderBy("id", "desc")->limit(4)->get();

        return view("main", compact("title", "calls"));
    }

    public function register(Request $request) {
        $request->validate([
            "name" => "required",
            "login" => "required|unique:users",
            "password" => "required",
            "password-repeat" => "required|same:password",
            "email" => "email|required",
            "ch" => "required"
        ]);

        $user = User::create([
            "name" => $request->name,
            "login" => $request->login,
            "password" => Hash::make($request->password),
            "email" => $request->email
        ]);

        Auth::login($user);

        return redirect()->route("user")->with("message", "Регистрация успешно выполнена");
    }

    public function login(Request $request) {
        if(Auth::attempt(["password" => $request->password, "login" => $request->login])) {
            return redirect()->route("user")->with("message", "Вход успешно выполнен");
        } else {
            return redirect()->back()->with("error", "Неправильный логин или пароль");
        }
    }

    public function showRegister() {
        $title = "Регистрация";

        return view("user.register", compact("title"));
    }

    public function showLogin() {
        $title = "Вход";

        return view("user.login", compact("title"));
    }

    public function logout() {
        Auth::logout();

        return redirect()->route("main");
    }
}
