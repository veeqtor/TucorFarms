@extends('layouts.app')

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item ">
                <a class="nav-link" href="{{url('/')}}"><i
                            class="fa fa-home">&nbsp;&nbsp;</i>Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{url('products')}}"><i
                            class="fa fa-product-hunt">&nbsp;&nbsp;</i>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}#services"><i
                            class="fa fa-wrench">&nbsp;&nbsp;</i>Services</a>
            </li>

            <li class="nav-item clicked">
                <a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-cart">&nbsp;&nbsp;</i>Cart<span
                            id="cartCount" class="badge badge-pill badge-custom "></span></a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div id="overall-products">
        <div class="container">
            <ul class="breadcrumb shadow">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Booking cart</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-lg-9">
                    <div class="page-content shadow">
                        <h3>Booking cart</h3>
                        <p class="text-muted">You have <span id="cartCount"></span> item(s) in your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit&nbsp;Price&nbsp;(&#8358;)</th>
                                    <th scope="col" colspan="2">Total&nbsp;(&#8358;)</th>
                                </tr>
                                </thead>
                                <tbody id="show-cart">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th colspan="3">&#8358;&nbsp;<span class="sub-total"></span></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="page-content shadow mb-3">
                        <div class="pull-left">
                            <a href="{{url('products')}}" class="btn btn-sm btn-custom"><i
                                        class="fa fa-chevron-left">&nbsp;</i>Continue
                                shopping</a>
                        </div>

                        <div class="pull-right">
                            @if(Auth::check())
                                <a href="{{route('checkout.billing', Auth::user()->id)}}" class="btn btn-sm btn-custom">Process
                                    order&nbsp;<i class="fa fa-chevron-right"></i>
                                </a>
                            @else
                                <a href="{{route('login')}}"
                                   class="btn btn-sm btn-custom">Process
                                    order&nbsp;<i class="fa fa-chevron-right"></i>
                                </a>
                            @endif
                        </div>

                        <div class="clearfix"></div>

                        <div class="text-center mt-3">
                            <a href="javascript:void(0)" id="clearCart" class="btn btn-sm btn-custom"><i
                                        class="fa fa-times-circle">&nbsp;</i>Clear cart
                            </a>
                        </div>
                    </div>
                    @include('includes.mayWant')
                </div>
                @include('includes.orderSummary')
            </div>
        </div>
    </div>
@endsection
