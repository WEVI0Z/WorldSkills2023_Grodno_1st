<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("Open_Sans/OpenSans-Bold.ttf")}}">
    <title>{{$title}}</title>
</head>
<body>
    @include("layouts.header")
    @include("layouts.alerts")

    <h1>{{$title}}</h1>
    @yield("content")
</body>
</html>
