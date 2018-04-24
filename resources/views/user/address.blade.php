@extends('layouts.app')

@section('nav-right')

    @include('includes.navForCart')

@endsection

@section('content')
    <div id="overall-products">
        <div class="container">
            <ul class="breadcrumb shadow">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Checkout</li>
                <li class="breadcrumb-item active">Delivery details</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-lg-9">
                    {!! Form::model($user, ['method'=>'PATCH','action' => ['CheckoutController@addressUpdate', $user->id], 'files'=>true ]) !!}
                    <div class="page-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <h3 class="lead py-2">Checkout - Delivery details</h3>
                        @include('includes.checkoutTab')
                        <div class="checkout-content">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <h2 class="lead text-muted">
                                        <small>Personal Information</small>
                                    </h2>
                                    <hr>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td width="70"><strong>Name:</strong></td>
                                            <td>{{ucfirst($user->lname)." ".$user->fname}}</td>
                                        </tr>
                                        <tr>
                                            <td width="70"><strong>Sex:</strong></td>
                                            <td>{{$user->gender == 0 ? "Male" : "Female"}}</td>
                                        </tr>
                                        <tr>
                                            <td width="70"><strong>Phone:</strong></td>
                                            @if(!is_null($user->phone))
                                                <td>{{$user->phone}}</td>
                                            @else
                                                <td> {!! Form::number('phone', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'+23470xxxxxxxx', 'required']) !!}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td width="70"><strong>E-Mail:</strong></td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <h2 class="lead text-muted">
                                        <small>Delivery Information</small>
                                    </h2>
                                    <hr>
                                    @if(is_null($user->address))
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                {!! Form::label('country', 'Country:', ['class' => 'text-muted']) !!}
                                                {!! Form::select('country', [0 =>'Nigeria'], null, ['class'=> 'form-control form-control-sm w-75']) !!}
                                            </div>
                                            <div class="form-group col-md-6">
                                                {!! Form::label('state', 'State:', ['class' => 'text-muted']) !!}
                                                {!! Form::select('state', [0 =>'Abuja', 1 => 'Niger'], null, ['class'=> 'form-control form-control-sm w-75']) !!}
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('address', 'Street Address:', ['class' => 'text-muted']) !!}
                                                {!! Form::text('address', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'Street name and House number']) !!}
                                            </div>
                                        </div>
                                    @else
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td width="70"><strong>Country:</strong></td>
                                                <td>{{$user->country == 0 ? 'Nigeria' : 'Not available'}}</td>
                                            </tr>
                                            <tr>
                                                <td width="70"><strong>State:</strong></td>
                                                <td>{{$user->state == 0 ? "Abuja" : "Niger"}}</td>
                                            </tr>
                                            <tr>
                                                <td width="70"><strong>Address:</strong></td>
                                                <td>{{$user->address}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <a href="{{route('user.edit', $user->id)}}"
                                           class="btn btn-sm btn-block btn-custom">Change
                                            address</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content shadow mb-3">
                        <div class="pull-left">
                            <a href="{{route('allProduct')}}" class="btn btn-sm btn-custom"><i
                                        class="fa fa-chevron-left">&nbsp;</i>Continue shopping</a>
                        </div>

                        <div class="pull-right">

                            @if(is_null($user->phone) || is_null($user->address))
                                <button type="submit" class="btn btn-sm btn-custom">Billing details&nbsp;<i
                                            class="fa fa-chevron-right"></i></button>
                            @else
                                <a href="{{route('checkout.delivery', $user->id)}}" class="btn btn-sm btn-custom">Billing
                                    details&nbsp;<i
                                            class="fa fa-chevron-right"></i>
                                </a>
                            @endif
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
