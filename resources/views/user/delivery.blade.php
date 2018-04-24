@extends('layouts.app')

@section('nav-right')
    @include('includes.navForCart')

@endsection

@section('content')
    <div id="overall-products">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Checkout</li>
                <li class="breadcrumb-item active">Delivery Method</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-lg-9">
                    {!! Form::model($user, ['method'=>'PATCH','action' => ['CheckoutController@deliveryUpdate', $user->id], 'files'=>true ]) !!}
                    <div class="page-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <h3 class="lead py-2">Checkout - Delivery method</h3>
                        @include('includes.checkoutTab')
                        <div class="checkout-content">
                            <div class="row">
                                <div class="col-sm-6 pb-3">
                                    <div class="card">
                                        <div class="card-body shipping-method">
                                            <h3>Farm pick up</h3>
                                            <p>Visit the farm to pick up your order.</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            {!! Form::radio('delivery', 'pick'); !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body shipping-method">
                                            <h4>Home delivery</h4>
                                            <p>Have your order delivered to you anywhere</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            {!! Form::radio('delivery', 'home', true); !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content mb-3">
                        <div class="pull-left">
                            <a href="{{route('checkout.billing', $user->id)}}" class="btn btn-sm btn-custom"><i
                                        class="fa fa-chevron-left">&nbsp;</i>Billing details</a>
                        </div>

                        <div class="pull-right">
                            <button href="#" type="submit" class="btn btn-sm btn-custom">Payment&nbsp;<i
                                        class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    {{Form::close()}}
                    @include('includes.mayWant')
                </div>
                @include('includes.orderSummary')
            </div>
        </div>
    </div>
@endsection
