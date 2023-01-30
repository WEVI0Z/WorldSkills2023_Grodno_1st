@extends("layouts.layout")

@section("content")
    <ul class="calls">
        @foreach($calls as $call)
            @include("calls.call")
        @endforeach
    </ul>
@endsection
