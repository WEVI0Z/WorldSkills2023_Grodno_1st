@extends("layouts.layout")
@section("content")
    <ul class="calls">
    @foreach($calls as $call)
        <li class="call">
            <h3>{{$call->pet}}</h3>
            <img width="300" src="http://groom-02/storage/32wFuxrbXQcjYBuhNqa26lFUvYBq3EJsowaJNKE1.jpg" alt="">
            <p class="status">
                {{$call->status}}
            </p>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->id == $call->user_id and $call->status == "Новая")
                    <a href="{{route("call.delete", ["id" => $call->id])}}">Удалить заявку</a>
                @endif
            @endif
        </li>

    @endforeach
    </ul>

    <a href="{{route("call")}}" class="create-new-button">
        Создать новую заявку
    </a>
@endsection
