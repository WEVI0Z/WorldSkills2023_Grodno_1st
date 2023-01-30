@extends("layouts.layout")

@section("content")
    <form action="{{route("login.send")}}" method="POST" class="login-form">
        @csrf
        <label for="">Логин: <input type="text" name="login"></label>
        <label for="">Пароль: <input type="password" name="password"></label>
        <button type="submit">Войти</button>
    </form>
@endsection
