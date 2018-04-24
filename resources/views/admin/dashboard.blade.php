@extends('layouts.admin')
@section('side-nav')
    <div class="side-nav">
        <ul class="side-nav-links">
            <li class="active">
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li>
                <a href="{{route('dashboard.category')}}"><i class="fa fa-cog"></i>&nbsp;&nbsp;Category</a>
            </li>
            <li>
                <a href="{{route('dashboard.products')}}"><i class="fa fa-product-hunt"></i>&nbsp;&nbsp;Products</a>
            </li>
            <li>
                <a href="{{route('dashboard.order')}}"><i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;Orders</a>
            </li>
        </ul>
    </div>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb shadow">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ul>
@endsection

@section('content')
    <div class="row" id="overall-orders">
        <div class="col-md-6">
            <a href="{{route('dashboard.order')}}" style="text-decoration: none"
               title="Click to go to orders all pending orders">
                <div class="dash-content shadow my-3 categories">
                    <h4 class="text-danger">PENDING ORDERS</h4>
                    <hr>
                    <h6 class="display-4"><i>{{$pending}}</i></h6>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{route('dashboard.products')}}" style="text-decoration: none"
               title="Click to view all fulfilled orders">
                <div class="dash-content shadow my-3 categories">
                    <h4 class="text-info">RUNNING LOW</h4>
                    <hr>
                    <h6 class="display-4"><i>{{$low}}</i></h6>
                </div>
            </a>
        </div>

    </div>
@endsection