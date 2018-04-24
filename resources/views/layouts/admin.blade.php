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

    <title>Tucor Farms | Dashboard</title>
    <link rel="icon" href="/img/twitter.png">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
</head>
<body>
<header class="container-fluid" id="header">
    <nav class="nav navbar justify-content-between ">
        <a href="javascript:void(0)" class="icon">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand d-none d-md-block d-lg-block" href="{{url('/')}}"><strong
                    style="text-transform: uppercase">Tucor</strong><span
                    style="font-family: monospace, sans-serif; font-style: italic; font-weight: 100; color: greenyellow">farms</span></a>
        <div class="justify-content-end">
            <ul class="nav">
                <li class="dropdown">
                    <a class="nav-link" href="#" role="button" id="user-profile" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img height="20" width="20" src="/img/eggs.jpg"
                             alt="">&nbsp;{{ucwords(Auth::user()->lname) ." ".ucwords(Auth::user()->fname) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-profile">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out">&nbsp;&nbsp;</i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<section class="grid">
    @yield('side-nav')

    <div class="main-content">
        <div class="container-fluid">
            @yield('breadcrumb')


            @yield('content')


        </div>

    </div>

</section>
<footer id="copyright-dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="pull-left">Copyright &copy; 2017 all rights reserved | <a href="#">
                        <small>Privacy Policy</small>
                    </a> | <a href="#">
                        <small>Terms of Use</small>
                    </a>
                    | <a href="#">
                        <small>FAQ</small>
                    </a></p>
                <div class="design">
                    <p class="justify-content-end"><strong
                                style="font-family: 'Source Sans Pro SemiBold', monospace">Mekkpro</strong><i
                                style="color: greenyellow; font-family: cursive">designs</i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--bootstrap core JavaScript -->
<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')


@if(Auth::check() && Auth::user()->delivery == 'home')
    @php($charge = 1500)
@else
    @php($charge = 0)
@endif
<script>
    let charge = Number("<?php echo $charge?>");
</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-63203797-2', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>

