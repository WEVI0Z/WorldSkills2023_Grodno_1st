<header class="header">
    <a href="{{route("main")}}" class="img"><img width="70"  src="{{asset("logo_groom.png")}}"  alt=""></a>
    <ul>
        @if(\Illuminate\Support\Facades\Auth::check())
            <li><a href="{{route("user")}}">Личный кабинет</a></li>
            <li><a href="{{route("logout")}}">Выйти</a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <li><a href="{{route("admin")}}">Администраторская панель</a></li>
            @endif
        @endif

        @if(!\Illuminate\Support\Facades\Auth::check())
                <li><a href="{{route("login")}}">Войти</a></li>
                <li><a href="{{route("register")}}">Зарегистрироваться</a></li>
        @endif
    </ul>
</header>
