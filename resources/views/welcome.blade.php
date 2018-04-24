@extends('layouts.app')
<!-- preloader -->
@section('preloader')
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
@endsection
<!-- end preloader -->

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item">
                <a class="nav-link" href="#greeting-header"><i class="fa fa-certificate">&nbsp;&nbsp;</i>About us</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="{{route('allProduct')}}"><i class="fa fa-product-hunt">&nbsp;&nbsp;</i>Products</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#services"><i class="fa fa-wrench">&nbsp;&nbsp;</i>Services</a>
            </li>

            @if(Auth::check() && Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}"><i class="fa fa-dashboard">&nbsp;&nbsp;</i>Dashboard
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-cart">&nbsp;</i>Cart
                        <span id="cartCount" class="badge badge-pill badge-custom "></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endsection


@section('content')
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
                        <a href="{{route('allProduct')}}" class="btn btn-lg btn-outline-custom">Book Now</a>
                    </div>
                </div>
                <div class="carousel-item item slides">
                    <div class="overlay"></div>
                    <div class="slide-2"></div>
                    <div class="caption">
                        <h1>Well well,!!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, veritatis.</p>
                        <a href="{{route('allProduct')}}" class="btn btn-lg btn-outline-custom">Book Now</a>
                    </div>
                </div>
                <div class=" carousel-item item slides">
                    <div class="overlay"></div>
                    <div class="slide-3"></div>
                    <div class="caption">
                        <h1>Shaku Shaku</h1>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="{{route('allProduct')}}" class="btn btn-lg btn-outline-custom">Book Now</a>
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
                        <a href="{{route('allProduct')}}" class="btn btn-block btn-custom">
                            Book Now!!
                        </a>
                        <a href="{{asset('register')}}" class="btn btn-block btn-custom">
                            Create Account!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="product-categories">

        <h3 class="pdt-header text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
            QUALITY PRODUCE, FRIENDLY
            SERVICE.<br>
            WE DELIVER THE BEST PRODUCTS
        </h3>

        <div class="container">
            <div class="products owl-carousel">
                <div class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"
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
                            <a href="{{url('products#fish')}}" class="btn btn-sm btn-block btn-custom">Book
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s"
                     data-wow-offset="10">
                    <div class="card">
                        <div class="card-header"><h3 class="text-center">Organic Eggs</h3></div>
                        <div class="card-body">
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                                omnis placeat
                                porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus nostrum,
                                obcaecati, quis rerum, soluta tempora!
                            </p>
                            <a href="{{route('allProduct')}}" class="btn btn-sm btn-block btn-custom">Book
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s"
                     data-wow-offset="10">
                    <div class="card">
                        <div class="card-header"><h3 class="text-center">Chicken</h3></div>
                        <div class="card-body">
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, nam
                                omnis placeat
                                porro quisquam rem. Distinctio eius eos hic iusto magnam natus necessitatibus nostrum,
                                obcaecati, quis rerum, soluta tempora!
                            </p>
                            <a href="{{route('allProduct')}}" class="btn btn-sm btn-block btn-custom">Book
                                Now</a>
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

                <div class="col-md-8 mb-3 wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                     data-wow-delay="0.2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header text-center"><h3>Organic Eggs</h3></div>
                                <div class="card-body">
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                                        dicta,
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
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam
                                        dicta,
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
                <div class="col-md-7 mb-3 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s"
                     data-wow-offset="10">
                    <div class="remark">
                        <div class="remark-header"><h3>Our Customers say</h3></div>
                        <div class="remark-body owl-carousel">
                            <div>
                                <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta,
                                        nam
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda commodi est
                                    expedita
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
@endsection
@push('script')
    <script>

    </script>
@endpush