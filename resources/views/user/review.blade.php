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
                <li class="breadcrumb-item active">Order Review</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-lg-9">
                    <div class="page-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <h3 class="lead py-2">Checkout - Order Review</h3>
                        @include('includes.checkoutTab')
                        <div class="checkout-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit&nbsp;Price&nbsp;(&#8358;)</th>
                                        <th scope="col">Total&nbsp;(&#8358;)</th>
                                    </tr>
                                    </thead>
                                    <tbody id="show-cart-review">


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3">Subtotal</th>
                                        <th><span class="sub-total"></span></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="page-content mb-3">
                        <div class="pull-left">
                            <a href="{{route('checkout.payment', $user->id)}}" class="btn btn-sm btn-custom"><i
                                        class="fa fa-chevron-left">&nbsp;</i>Payment
                            </a>

                        </div>

                        <div class="pull-right">
                            <a href="javascript:void(0)" class="checkout-btn btn btn-sm btn-custom">Checkout&nbsp;<i
                                        class="fa fa-chevron-right">&nbsp;</i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @include('includes.mayWant')
                </div>
                @include('includes.orderSummary')
            </div>
        </div>
    </div>
@endsection
