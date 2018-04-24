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
                <div class="col-md-12">
                    <div class="page-content shadow mb-3">
                        @if(session()->has('update-msg'))
                            <div class="alert alert-info text-center" role="alert">
                                {{session('update-msg')}}
                            </div>
                        @endif
                        <h3 class="">Edit Profile</h3>
                        <hr>
                        {!! Form::model($user, ['method'=>'PATCH','action' => ['AccountController@update', $user->id], 'files'=>true ]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h5 class="text-muted">
                                    <small>Personal information</small>
                                </h5>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('fname', 'First Name:', ['class' => 'text-muted']) !!}
                                        {!! Form::text('fname', null, ['class'=> 'form-control form-control-sm', 'readonly']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('lname', 'Last Name:', ['class' => 'text-muted']) !!}
                                        {!! Form::text('lname', null, ['class'=> 'form-control form-control-sm', 'readonly']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('gender', 'Gender:', ['class' => 'text-muted']) !!}
                                        {!! Form::select('gender', [''=>'Choose gender',0 =>'Male', 1 => 'Female'], null, ['class'=> 'form-control form-control-sm w-75']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phone', 'Phone:', ['class' => 'text-muted']) !!}
                                        {!! Form::number('phone', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'+23470xxxxxxxx']) !!}

                                    </div>
                                    <div class="form-group col-md-12">
                                        {!! Form::label('email', 'E-mail Address:', ['class' => 'text-muted']) !!}
                                        {!! Form::email('email', null, ['class'=> 'form-control form-control-sm', 'readonly']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <h5 class="text-muted">
                                    <small>Delivery information</small>
                                </h5>
                                <hr>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            {!! Form::label('country', 'Country:', ['class' => 'text-muted']) !!}
                                            {!! Form::select('country', [0 =>'Nigeria'], null, ['class'=> 'form-control form-control-sm w-100']) !!}
                                        </div>
                                        <div class="form-group col-md-12">
                                            {!! Form::label('state', 'State:', ['class' => 'text-muted']) !!}
                                            {!! Form::select('state', [0 =>'Abuja', 1 => 'Niger'], null, ['class'=> 'form-control form-control-sm w-100']) !!}
                                        </div>
                                        <div class="form-group col-md-12">
                                            {!! Form::label('address', 'Street Address:', ['class' => 'text-muted']) !!}
                                            {!! Form::text('address', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'Street name and House number']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-6">
                                <a href="{{url('/')}}" class="btn btn-sm btn-custom"><i class="fa fa-home">&nbsp;</i>Home</a>
                            </div>
                            <div class="form-group col-6">
                                {!! Form::submit('Update', ['class' => 'btn btn-sm btn-custom pull-right']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-12">
                    @include('includes.mayWant')
                </div>
            </div>
        </div>
    </div>
@endsection
