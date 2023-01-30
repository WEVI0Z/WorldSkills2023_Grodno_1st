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
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <form action="{{route("change-status", ["id" => $call->id])}}" method="post" class="status-form" enctype="multipart/form-data">
                        @csrf
                        @if($call->status == "Обработка данных")
                            <label for="">
                                Фото оказанной услуги:
                                <input type="file" name="photo_after" id="" required>
                            </label>
                        @endif
                        <button type="submit">Поменять статус</button>
                    </form>
                @endif
            @endif
        </li>
    @endforeach
    </ul>
@endsection
