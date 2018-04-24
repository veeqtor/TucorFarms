@extends('layouts.app')

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item clicked">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div id="overall-content">
        <div class="container">
            <h1 class="lead text-center" style="margin: 15% auto; font-size: 2rem">Oops!!! the page you are looking for
                could not be found
            </h1>
        </div>
    </div>
@endsection

@section('footer')
    <!--FOOTER-->
    <footer id="footer">
        <div class="container">
            <div class="row footer1">
                <div class="col-md-12">
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
@endsection