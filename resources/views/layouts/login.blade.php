<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Mekkpro">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Description" content="Tucor Farms">
    <meta name="Keywords"
          content="catfish feeding, bathing,Fish, Eggs, Day old broiler, Broiler meat, Old layers, Fish fingerlins, Jumbo fish, Juvenile fish, Table Size fish, Parent broad stock"/>
    <meta name="Classification" content="Catfish farming, Aquaculture, Agriculture">
    <meta name="distribution" content="Global"/>
    <meta name="rating" content="General"/>
    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="21 days"/>
    <meta name="publisher" content="MekkproDesigns"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>


    <link rel="icon" href="img/twitter.png">
    <!--Web-font-->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,600" rel="stylesheet">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body id="bg-login">
<section id="login-page">
    <div class="logo">
        <h1 class="text-center"><a href="#">
                <strong style="text-transform: uppercase">Tucor</strong><span
                        style="font-family: monospace, sans-serif; font-style: italic; font-weight: 100; color: greenyellow">farms</span></a>
        </h1>
    </div>
@yield('content')


<!-- begin:copyright -->
</section>

<footer class="copyright text-center">
    <div class="container-fluid">
        <small>&copy;2017 All rights reserved.</small>
        <a href="/" target="_blank">&nbsp;www.example.com</a>
    </div>
</footer>


<!-- Javascript files-->
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>
