@if($errors->any())
    <ul class="errors-list">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if(session("message"))
    <p class="message">{{session("message")}}</p>
@endif

@if(session("error"))
    <p class="error">{{session("error")}}</p>
@endif
