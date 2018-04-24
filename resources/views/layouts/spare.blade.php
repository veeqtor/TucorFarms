@extends('layouts.app')

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


    <!-- InstanceEndEditable -->
    <title>Tucor Farms</title>


    <link rel="icon" href="img/twitter.png">
    <!--Web-font-->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,600" rel="stylesheet">


    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>


<body>
<!-- preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
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
                               aria-haspopup="true" aria-expanded="false"><i
                                        class="fa fa-user">&nbsp;</i>{{ Auth::user()->lname }}&nbsp;<i
                                        class="fa fa-angle-down"></i><span
                                        class="sr-only">(current)</span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="products.html">Profile</a>
                                <a class="dropdown-item" href="products.html">Settings</a>
                                <div class="dropdown-divider"></div>

                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout
                                    <i class="fa fa-sign-out"></i>
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
        <a class="navbar-brand brand" href="#"><strong style="text-transform: uppercase">Tucor</strong><span
                    style="font-family: monospace, sans-serif; font-style: italic; font-weight: 100; color: greenyellow">farms</span></a>
        <button class="navbar-toggler toggler" type="button" data-toggle="collapse"
                data-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
            <ul class="navbar-nav links">
                <li class="nav-item clicked">
                    <a class="nav-link" href="#greeting-header">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Products&nbsp;<i
                                class="fa fa-chevron-down"></i><span class="sr-only">(current)</span></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="products.html">Chicken</a>
                        <a class="dropdown-item" href="products.html#fish">Fish</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html"><i class="fa fa-shopping-cart">&nbsp;</i>Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!--Slider section-->
<section id="slider">
    <div id="bs-carousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="10000">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#bs-carousel" data-slide-to="1"></li>
            <li data-target="#bs-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item carousel-item slides active">
                <div class="overlay"></div>
                <div class="slide-1"></div>
                <div class="caption">
                    <h1>Welcome</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <a href="products.html" class="btn btn-lg btn-custom">Book Now</a>
                </div>
            </div>
            <div class="carousel-item item slides">
                <div class="overlay"></div>
                <div class="slide-2"></div>
                <div class="caption">
                    <h1>Well well,!!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, veritatis.</p>
                    <a href="products.html" class="btn btn-lg btn-custom">Book Now</a>
                </div>
            </div>
            <div class=" carousel-item item slides">
                <div class="overlay"></div>
                <div class="slide-3"></div>
                <div class="caption">
                    <h1>Shaku Shaku</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <a href="products.html" class="btn btn-lg btn-custom">Book Now</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#bs-carousel" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bs-carousel" role="button" data-slide="next">
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<!--Product Categories section-->
<section id="greeting-header">
    <div class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
        <h1 class="">Hello and Welcome to our farm</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="animated fadeInUp">
                    <p class="lead">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Aperiam eligendi, libero magni minus quae quas
                        quo sit ut? Nihil, repudiandae.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="animated fadeInUp">
                    <a href="products.html" class="btn btn-block btn-custom">
                        Book Now!!
                    </a>
                    <a href="register.html" class="btn btn-block btn-custom">
                        Create Account!
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="product-categories">

    <h3 class="pdt-header text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
        QUALITY PRODUCE, FRIENDLY
        SERVICE.<br>
        WE DELIVER THE BEST PRODUCTS
    </h3>

    <div class="container">
        <div class="products owl-carousel">
            <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                 data-wow-offset="10">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Fish</h3></div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta,
                            nam
                            omnis placeat
                            porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus
                            nostrum,
                            obcaecati, quis rerum, soluta tempora!
                        </p>
                        <a href="products.html" class="btn btn-sm btn-block btn-custom">Book Now</a>

                    </div>
                </div>
            </div>
            <div class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s"
                 data-wow-offset="10">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Organic Eggs</h3></div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                            omnis placeat
                            porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus nostrum,
                            obcaecati, quis rerum, soluta tempora!
                        </p>
                        <a href="products.html" class="btn btn-sm btn-block btn-custom">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"
                 data-wow-offset="10">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Chicken</h3></div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                            omnis placeat
                            porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus nostrum,
                            obcaecati, quis rerum, soluta tempora!
                        </p>
                        <a href="products.html" class="btn btn-sm btn-block btn-custom">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="services">
    <div class="services-header wow slideInDown" data-wow-offset="10" data-wow-duration="1s"
         data-wow-delay="0.2">
        <h3 class="text-center">WHAT WE DO ?</h3>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 wow zoomIn" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.2">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Organic Eggs</h3></div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                            omnis placeat
                            porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus nostrum,
                            obcaecati, quis rerum, soluta tempora!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3 wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-center"><h3>Organic Eggs</h3></div>
                            <div class="card-body">
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta,
                                    nam
                                    omnis placeat
                                    porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus
                                    nostrum,
                                    obcaecati, quis rerum, soluta tempora!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3  wow slideInUp" data-wow-offset="10" data-wow-duration="1s"
                         data-wow-delay="0.2">
                        <div class="card">
                            <div class="card-header text-center"><h3>Healthy Chickens</h3></div>
                            <div class="card-body">
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta,
                                    nam
                                    omnis placeat
                                    porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus
                                    nostrum,
                                    obcaecati, quis rerum, soluta tempora!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="others">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-3 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s" data-wow-offset="10">
                <div class="remark">
                    <div class="remark-header"><h3>Our Customers say</h3></div>
                    <div class="remark-body owl-carousel">
                        <div>
                            <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                                    omnis placeat
                                    porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus
                                    nostrum,
                                    obcaecati, quis rerum, soluta tempora!</p>
                            </blockquote>
                            <div class="remark-footer">
                                <p>Andre</p>
                            </div>
                        </div>
                        <div>
                            <blockquote><p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                                    omnis placeat
                                    porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus
                                    nostrum,
                                    obcaecati, quis rerum, soluta tempora!</p>
                            </blockquote>
                            <div class="remark-footer">
                                <p>Peter</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="1s" data-wow-offset="10">
                <div class="promo">
                    <div class="promo-full">
                        <div class="promo-header"><h3>The Freshest Eggs You'll Ever Taste!</h3></div>
                        <div class="promo-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda commodi est expedita
                                illum maiores porro possimus quibusdam temporibus voluptatem voluptatum.
                                CALL
                            </p>
                        </div>
                        <div class="promo-footer">
                            <div class="cite">
                                <p><i class="fa fa-phone">&nbsp;</i>+123 054 5214</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="products-gallery">
    <h3 class="text-center">Our Gallery</h3>

    <div class="gallery owl-carousel">
        <div class="">
            <a href="img/hen.jpeg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/hen.jpeg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/catfish2.jpg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/catfish2.jpg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/catfish1.jpg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/catfish1.jpg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/maturehen.jpg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/maturehen.jpg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/small-chicks.jpeg" data-fancybox="images" data-caption="My caption">
                <img height=200" src="img/small-chicks.jpeg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/eggs.jpeg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/eggs.jpeg" alt="">
            </a>
        </div>
        <div class="item">
            <a href="img/eggs.jpg" data-fancybox="images" data-caption="My caption">
                <img height="200" src="img/eggs.jpg" alt="">
            </a>
        </div>
    </div>
</section>


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
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Create an account</a>
                    </li>
                    <li>
                        <a href="#product-categories">Products</a>
                    </li>

                    <li>
                        <a href="#services">Services</a>
                    </li>

                    <li>
                        <a href="#greeting-header">About us</a>
                    </li>
                </ul>
            </div>


            <div class="col-md-4">
                <h3>Follow us</h3>
                <ul class="social">
                    <li class=""><a href="http://facebook.com/">
                            <img height="30px" src="img/facebook.png" alt="Facebook">
                        </a>
                    </li>
                    <li class=""><a href="http://twitter.com/">
                            <img height="30px" src="img/twitter.png" alt="Twitter">
                        </a>
                    </li>
                    <li class="">
                        <a href="http://instagram.com/">
                            <img height="30px" src="img/instagram.png" alt="Instgram">
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