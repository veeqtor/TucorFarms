@extends('layouts.admin')
@section('side-nav')
    <div class="side-nav">
        <ul class="side-nav-links">
            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li>
                <a href="{{route('dashboard.category')}}"><i class="fa fa-cog"></i>&nbsp;&nbsp;Category</a>
            </li>
            <li>
                <a href="{{route('dashboard.products')}}"><i class="fa fa-product-hunt"></i>&nbsp;&nbsp;Products</a>
            </li>
            <li class="active">
                <a href="{{route('dashboard.order')}}"><i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;Orders</a>
            </li>
        </ul>
    </div>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb shadow">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Orders</li>
    </ul>
@endsection

@section('content')
    <div class="row" id="overall-orders">
        <div class="col-12">
            {!! Form::open(['method'=>'GET']) !!}
            <div class="input-group input-group-sm">
                {!! Form::text('reference_id', null, ['class'=> 'form-control form-control-sm', 'placeholder'=> 'Search by reference ID']) !!}
                <div class="input-group-append">
                    {!!Form::button('Search&nbsp;<i class="fa fa-search"></i>',['type' => 'submit', 'class'=> 'btn btn-custom btn-sm '])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <a href="javascript:void(0)" id="all-pending" style="text-decoration: none"
               title="Click to view all pending orders">
                <div class="dash-content shadow my-3 categories">
                    <h4 class="text-danger">PENDING</h4>
                    <hr>
                    <h6 class="display-4"><i><span id="pending"></span></i></h6>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="javascript:void(0)" id="all-processed" style="text-decoration: none"
               title="Click to view all fulfilled orders">
                <div class="dash-content shadow my-3 categories">
                    <h4 class="text-info">FULFILLED</h4>
                    <hr>
                    <h6 class="display-4"><i><span id="shipped"></span></i></h6>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="javascript:void(0)" id="all-delivered" style="text-decoration: none"
               title="Click to view all delivered orders">
                <div class="dash-content shadow my-3 categories">
                    <h4 class="text-success">DELIVERED</h4>
                    <hr>
                    <h6 class="display-4"><i><span id="delivered"></span></i></h6>
                </div>
            </a>
        </div>

        <div class="col-12">
            <div class="header-content shadow">
                <p>Orders</p>
            </div>
            <div class="table-responsive dash-content shadow">
                <div id="OrdersTable">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Item&nbsp;Names&nbsp;&&nbsp;Qty</th>
                            <th>Total</th>
                            <th colspan="3">Date</th>
                        </tr>
                        </thead>
                        <tbody id="orderData">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/order-script.js')}}"></script>
@stop