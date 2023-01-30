<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallsController extends Controller
{
    public function user() {
        $title = "Личный кабинет";

        $calls = Call::query()->where("user_id", "=", Auth::user()->id)->get();

        return view("calls.user", compact("title", "calls"));
    }

    public function showCall() {
        $title = "Создание заявки";

        return view("calls.create", compact("title"));
    }

    public function create(Request $request) {
        $request->validate([
            "pet" => "required",
            "photo" => "required|mimes:jpg,jpeg,bmp|max:2048"
        ]);

        $photo = $request->file("photo")->store("storage");

        Call::create([
            "pet" => $request->pet,
            "photo" => "http://groom-02/storage" . $photo,
            "photo_after" => null,
            "status" => "Новая",
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route("user")->with("message", "Заявка успешно создана");
    }

    public function admin(Request $request) {

    }

    public function changeStatus(Request $request, $id) {
        $call = Call::query()->find($id);

        if($call->status == "Новая") {
            $call->update(["status" => "Обработка данных"]);

            return redirect()->back()->with("message", "Статус заявки успешно сменен");
        }
        if ($call->status == "Обработка данных") {
            $request->validate([
                "photo_after" => "nullable|mimes:jpg,jpeg,bmp|max:2048"
            ]);

            $photo = $request->file("photo_after")->store("storage");
            $call->update(["status" => "Услуга оказана", "photo_after" => $photo]);

            return redirect()->back()->with("message", "Статус заявки успешно сменен");
        } else {
            return redirect()->back()->with("error", "Смена статуса 'Услуга оказана' невозможна");
        }
    }

    public function showAdmin() {
        $title = "Администраторская панель";

        $calls = Call::query()->get();

        return view("calls.admin", compact("title", "calls"));
    }

    public function delete(Request $request, $id) {
        Call::query()->find($id)->delete();

        return redirect()->route("user")->with("message", "Заявка успешно удалена");
    }
}
