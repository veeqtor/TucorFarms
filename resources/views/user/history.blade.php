@extends('layouts.app')

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item clicked">
                <a class="nav-link" href="{{url('/')}}"><i class="fa fa-home">&nbsp;&nbsp;</i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('allProduct')}}"><i class="fa fa-product-hunt">&nbsp;&nbsp;</i>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/#services')}}"><i class="fa fa-wrench">&nbsp;&nbsp;</i>Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cartItems')}}"><i class="fa fa-shopping-cart">&nbsp;</i>Cart<span
                            id="cartCount" class="badge badge-pill badge-custom "></span></a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div id="overall-products">
        <div class="container animated fadeIn">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="page-content shadow">
                        @if(count($historys) > 0)
                            @foreach($historys as $history)
                                <a href="javascript:void(0)" data-ref="{{$history->reference_id}}"
                                   style="text-decoration: none;color: inherit"
                                   class="view-print">
                                    <div class="col-12 order-history">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span><small>OrderID:&nbsp;</small><strong>{{$history->reference_id}}</strong></span>
                                            </div>
                                            <div class="col-md-4">
                                                @if($history->received == null)
                                                    <span class="d-block text-danger">Processing</span>
                                                @elseif($history->received == 1)
                                                    <span class="d-block text-primary">Fulfilled/Ready for pickup</span>

                                                @elseif($history->received == 2)
                                                    <span class="d-block text-success">Delivered/Picked-up</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <small class="text-muted pull-right">
                                                    <em>{{$history->created_at->diffForHumans()}}</em>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <h6 class="lead text-center">Empty</h6>
                        @endif
                        <div class="pagination-sm mt-4">
                            {{$historys->render('pagination::bootstrap-4')}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
