@extends("layouts.layout")

@section("content")
    <form action="{{route("register.send")}}" method="POST" class="register-form">
        @csrf
        <label for="">ФИО: <input type="text" required name="name"></label>
        <label for="">Логин: <input type="text" required name="login"></label>
        <label for="">Email: <input type="email" required name="email"></label>
        <label for="">Пароль: <input type="password" required name="password"></label>
        <label for="">Повтор пароля:<input type="password" required name="password-repeat"></label>
        <label for=""><input type="checkbox" required name="ch"> - согласие на обработку данных</label>
        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection
