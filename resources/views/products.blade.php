@extends('layouts.app')

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item ">
                <a class="nav-link" href="{{url('/')}}"><i
                            class="fa fa-home">&nbsp;&nbsp;</i>Home</a>
            </li>
            <li class="nav-item clicked dropdown">
                <a class="nav-link" href="{{url('products')}}"><i
                            class="fa fa-product-hunt">&nbsp;&nbsp;</i>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/#services')}}"><i
                            class="fa fa-wrench">&nbsp;&nbsp;</i>Services</a>
            </li>

            @if(Auth::check() && Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}"><i
                                class="fa fa-dashboard">&nbsp;&nbsp;</i>Dashboard
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}"><i class="fa fa-shopping-cart">&nbsp;&nbsp;</i>Cart<span
                                id="cartCount" class="badge badge-pill badge-custom "></span></a>
                </li>
            @endif
        </ul>
    </div>
@endsection

@section('content')
    <div id="overall-products">
        <div class="container">
            <ul class="breadcrumb shadow">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="header-content shadow">
                        <h4>Products</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam assumenda blanditiis
                            dignissimos ea eaque explicabo incidunt modi odio vero.</p>
                    </div>
                    <div class="wow fadeIn mb-5" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                    <div class="products-list shadow">
                                        <img height="200px" src="{{$product->thumbnail->thumbName}}" alt="">
                                        <h5>{{$product->item}}</h5>
                                        <div class="lead py-2">
                                            <p>
                                                &#8358;&nbsp;{{$product->price}}/
                                                <small>{{$product->per}}</small>
                                            </p>
                                        </div>
                                        <div class="py-2">
                                            <a class="add-to-cart btn btn-sm btn-custom"
                                               data-item="{{$product->item}}"
                                               data-id="{{$product->id}}" data-price="{{$product->price}}"
                                               data-per="{{$product->per}}"
                                               href="javascript:void(0)">
                                                <i class="fa fa-cart-plus">&nbsp;</i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="pagination-sm">
                            {{$products->render('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
