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

    <title>Tucor Farms</title>


    <link rel="icon" href="/img/twitter.png">
    <!--Web-font-->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,600" rel="stylesheet">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>

</head>
<body>
<!-- preloader -->
@yield('preloader')
<!-- end preloader -->

<!--Top Header-->
<header id="info-header">
    <div class="container">
        <div class="row">
            <div class="col col-md-6 d-none d-sm-block">
                <ul class="support left">
                    <li><a href="mailto:info@example.com"><i class="fa fa-envelope">&nbsp;</i>info@example.com</a>
                    </li>
                    <li><span><i class="fa fa-phone">&nbsp;</i>+046 226 16161</span></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="support right">
                    @guest
                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in">&nbsp;</i>Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus">&nbsp;</i>Create an Account</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" id="dropdown01" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img height="15" class="rounded" src="/img/Placeholder.png"
                                     alt="">&nbsp;{{ucwords(Auth::user()->lname) ." ".ucwords(Auth::user()->fname)}}
                                &nbsp;<i
                                        class="fa fa-angle-down"></i><span
                                        class="sr-only">(current)</span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                                @if(Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{route('dashboard')}}"><i
                                                class="fa fa-dashboard">&nbsp;&nbsp;</i>Dashboard</a>
                                @endif


                                @if(!Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}"><i
                                                class="fa fa-user">&nbsp;&nbsp;</i>Profile</a>
                                    <a class="dropdown-item" href="{{route('user.history')}}"><i
                                                class="fa fa-history">&nbsp;&nbsp;</i>My Orders
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>

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
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>


<!--Navigation-->
<nav id="bg" class="navbar navbar-expand-md bg-custom fixed-top fixed-top-custom">
    <div class="container">
        <a class="navbar-brand brand" href="{{url('/')}}"><strong style="text-transform: uppercase">Tucor</strong><span
                    style="font-family: monospace, sans-serif; font-style: italic; font-weight: 100; color: greenyellow">farms</span></a>
        <button class="navbar-toggler toggler" type="button" data-toggle="collapse"
                data-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa fa-bars"></i></span>
        </button>

        @yield('nav-right')
    </div>
</nav>
@if(Auth::check() && Auth::user()->delivery == 'home')
    @php($charge = 1500)
@else
    @php($charge = 0)
@endif
<script>
    let charge = Number("<?php echo $charge?>");
</script>


<!--Slider section-->
@yield('content')


<!--FOOTER-->

<footer id="footer">
    <div class="container">
        <div class="row footer1">
            <div class="col-md-4 mb-3">
                <h3>Get in touch</h3>
                <ul class="menu-footer">
                    <li class="p-1">
                        <span><i
                                    class=" fa fa-map-marker">&nbsp;&nbsp; </i>2 Harold Road,Chelmsford, UK, GL11 4EA</span>
                    </li>

                    <li>
                        <i class="fa fa-envelope">&nbsp;&nbsp;</i><a
                                href="mailto:info@example.com">info@example.com</a>
                    </li>

                    <li>
                        <span><i class="fa fa-phone">&nbsp;&nbsp;</i>+046 226 16161</span>
                    </li>
                </ul>
            </div>


            <div class="col-md-4 mb-3">
                <h3>Menu</h3>
                <ul class="menu-footer">
                    <li>
                        <a href="{{route('login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}">Create an account</a>
                    </li>
                    <li>
                        <a href="{{url('products')}}">Products</a>
                    </li>

                    <li>
                        <a href="{{url('/')}}#services">Services</a>
                    </li>

                    <li>
                        <a href="{{url('/')}}#greeting-header">About us</a>
                    </li>
                </ul>
            </div>


            <div class="col-md-4">
                <h3>Follow us</h3>
                <ul class="social">
                    <li class=""><a href="http://facebook.com/">
                            <img height="30px" src="/img/facebook.png" alt="Facebook">
                        </a>
                    </li>
                    <li class=""><a href="http://twitter.com/">
                            <img height="30px" src="/img/twitter.png" alt="Twitter">
                        </a>
                    </li>
                    <li class="">
                        <a href="http://instagram.com/">
                            <img height="30px" src="/img/instagram.png" alt="Instgram">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <footer id="copyright">
        <div class="container">
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
</footer>


<a class="scrolltop" href="#info-header"><span class="fa fa-angle-up"></span></a>


<!--bootstrap core JavaScript -->
<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')

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