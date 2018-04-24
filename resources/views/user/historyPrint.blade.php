@extends('layouts.app')

@section('nav-right')
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
        <ul class="navbar-nav links">
            <li class="nav-item clicked">
                <a class="nav-link" href="{{url('/')}}"><i class="fa fa-home">&nbsp;&nbsp;</i>Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{url('products')}}"><i
                            class="fa fa-product-hunt">&nbsp;&nbsp;</i>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}#services"><i class="fa fa-wrench">&nbsp;&nbsp;</i>Services</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div id="overall-products">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="page-content print-content">
                        <div>
                            <div class="pull-left"><strong>Date:&nbsp;</strong>
                                <small id="history-date"></small>
                            </div>
                            <div class="pull-right"><strong>Sales Reciept
                                    no:&nbsp;</strong><span id="reference_id"></span></div>
                        </div>
                        <div class="text-center"><h3><strong>TUCORfarms</strong></h3>
                            <hr>
                            <span>2 Harold Road,Chelmsford, UK, GL11 4EA</span><br><span>+046 226 16161</span><br><span>info@example.com</span>
                        </div>
                        <div id="billed-to"><strong>Billed To:&nbsp;</strong><br>
                            <hr>
                            @php($user = Auth::user())
                            <table class="table table-sm">
                                <tbody>
                                <tr>
                                    <td width="70"><strong>Name:</strong></td>
                                    <td>{{ucfirst($user->lname)." ".$user->fname}}</td>
                                </tr>
                                <tr>
                                    <td width="70"><strong>Phone:</strong></td>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td width="70"><strong>Address:</strong></td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="table-responsive py-4" id="order-details">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>Item&nbsp;Name</th>
                                        <th>Qty</th>
                                        <th>Unit&nbsp;Price&nbsp;(₦)</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="history-print">

                                    </tbody>
                                </table>
                            </div>
                            <div id="order-footer"><p class="text-muted">Shipping and additional costs are
                                    calculated based on the values you have entered.</p>
                                <table class="table table-sm order-summ">
                                    <tbody>
                                    <tr>
                                        <td class="text-muted">Tax</td>
                                        <td>₦&nbsp;0.00</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; font-size: large">Total</td>
                                        <td>₦&nbsp;<strong class="history-total-print"></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="text-center my-3"><p>Thanks for the patronage<br>we expect your
                                        next visit!</p>
                                    <p>For complaints Or suggestions on how to improve our services<br>Please
                                        call 07068662986</p>
                                </div>
                                <a href="javascript:void(0)" onclick="window.print()"
                                   class="btn btn-sm btn-block btn-custom">Print&nbsp;
                                    <i class="fa fa-print"></i>
                                </a>
                                <a href="{{route('user.history')}}" class="btn btn-sm btn-block btn-custom">
                                    <i class="fa fa-chevron-left">&nbsp;</i>Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/myOrders-script.js')}}"></script>
@stop