<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <title>@yield("title")</title>
</head>
<body style="background-color: #222831;">
<nav class="navbar-dark bg-dark navbar">
    <div class="container">
        <a href="{{route("index.index")}}" class="mx-auto btn border-warning btn-outline-warning btn-secondary" style="font-size: 1.125rem">Home</a>
    </div>
</nav>
<div class="container pt-3">
    @yield("content")
</div>
<script src="{{asset("js/app.js")}}"></script>
<script>
    $(function () {
        $(".alert-success").fadeOut(3000);
    })
</script>
</body>
</html>
