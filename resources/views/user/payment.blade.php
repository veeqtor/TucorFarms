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
                    {!! Form::model($user, ['method'=>'PATCH','action' => ['CheckoutController@PaymentUpdate', $user->id], 'files'=>true ]) !!}
                    <div class="page-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <h3 class="lead py-2">Checkout - Delivery method</h3>
                        @include('includes.checkoutTab')
                        <div class="checkout-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body shipping-method">
                                            <h3>Pay on delivery</h3>
                                            <p>Pay when you get your order</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            {!! Form::radio('payment', 'pod'); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body shipping-method">
                                            <h4>Pay online</h4>
                                            <p>Visa or Mastercard or Quickteller</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <input name="payment" type="radio" value="poo" disabled=disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content mb-3">
                        <div class="pull-left">
                            <a href="{{route('checkout.delivery', $user->id)}}" class="btn btn-sm btn-custom"><i
                                        class="fa fa-chevron-left">&nbsp;</i>Delivery</a>
                        </div>

                        <div class="pull-right">
                            <button href="#" type="submit" class="btn btn-sm btn-custom">Review&nbsp;<i
                                        class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    {!! Form::close() !!}
                    @include('includes.mayWant')
                </div>
                @include('includes.orderSummary')
            </div>
        </div>
    </div>
@endsection
