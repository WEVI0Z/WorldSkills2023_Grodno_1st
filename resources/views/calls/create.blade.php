@extends("layouts.layout")

@section("content")
    <form action="{{route("call.send")}}" method="POST" class="call-form" enctype="multipart/form-data">
        @csrf
        <label for="">Кличка животного: <input type="text" name="pet"></label>
        <label for="">Фотография: <input type="file" name="photo"></label>
        <button type="submit">Создать</button>
    </form>
@endsection
