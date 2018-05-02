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
            <li class="active">
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
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('pUpdate') || session()->has('pAdd') || session()->has('pDel'))
                <div class="text-center alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-info-circle"></i>
                    {{session('pUpdate')}}
                    {{session('pAdd')}}
                    {{session('pDel')}}
                </div>
            @endif

        </div>
        <div class="col-md-8">
            <div class="header-content shadow">
                <p>Products</p>
            </div>
            <div class="dash-content shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th>S/n</th>
                            <th colspan="2">PRODUCT</th>
                            <th>IN&nbsp;STOCK</th>
                            <th>PRICE(&#8358;)</th>
                            <th>CATEGORY</th>
                            <th>DATE</th>
                            <th colspan="2">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($count = 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{++$count}}</td>
                                <td><img height="50" src="{{$product->thumbnail->thumbName}}"
                                         alt="{{$product->thumbnail->thumbName}}">
                                </td>
                                <td><span class="text-muted"
                                          style="text-transform: uppercase; font-weight: bolder">{{$product->item}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{$product->quantity}}</span>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        {{$product->price}}/<small>{{$product->per}}</small>
                                    </span>
                                </td>
                                <td>
                                    <small>
                                        <i class="text-secondary">
                                            {{$product->category->type}}
                                        </i>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        {{$product->created_at->diffForHumans()}}
                                    </small>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-block btn-custom"
                                       href="{{route('dashboard.editProduct', $product->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method'=> 'DELETE','route' => ['dashboard.deleteProduct', $product->id ],'class'=> 'delete' ])!!}

                                    {!!Form::button('<i class ="fa fa-trash"></i>',['type' => 'submit', 'class'=> 'btn btn-danger btn-sm btn-block', 'style'=>'font-size: 0.7rem', isset($editProduct)? 'disabled' : ''])!!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-sm">
                        {{$products->render('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>

            @if(count($lowProducts) > 0)
                <div class="dash-content shadow">
                    <div id="edit-product" class="header-content">
                        <p class="text-danger">You are running low in the following products</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th colspan="2">PRODUCT</th>
                                <th>IN&nbsp;STOCK</th>
                                <th>PRICE(&#8358;)</th>
                                <th>CATEGORY</th>
                                <th>DATE</th>
                                <th colspan="2">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($count = 0)
                            @foreach($lowProducts as $lowProduct)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td><img height="50" src="{{$lowProduct->thumbnail->thumbName}}"
                                             alt="{{$lowProduct->thumbnail->thumbName}}">
                                    </td>
                                    <td><span class="text-muted"
                                              style="text-transform: uppercase; font-weight: bolder">{{$lowProduct->item}}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{$lowProduct->quantity}}</span>
                                    </td>
                                    <td>
                                    <span class="text-muted">
                                        {{$lowProduct->price}}/<small>{{$lowProduct->per}}</small>
                                    </span>
                                    </td>
                                    <td>
                                        <small>
                                            <i class="text-secondary">
                                                {{$lowProduct->category->type}}
                                            </i>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            {{$lowProduct->created_at->diffForHumans()}}
                                        </small>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-block btn-custom"
                                           href="{{route('dashboard.editProduct', $lowProduct->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=> 'DELETE','route' => ['dashboard.deleteProduct', $lowProduct->id ],'class'=> 'delete' ])!!}

                                        {!!Form::button('<i class ="fa fa-trash"></i>',['type' => 'submit', 'class'=> 'btn btn-danger btn-sm btn-block', 'style'=>'font-size: 0.7rem', isset($editProduct)? 'disabled' : ''])!!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination-sm">
                            {{$lowProducts->render('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div id="edit-product" class="header-content shadow">
                        <p>Update Product</p>
                    </div>
                    <div class="dash-content shadow">
                        @if(isset($editProduct))
                            {!! Form::model($editProduct, ['method' => 'PATCH',  'route' => ['dashboard.updateProduct', $editProduct->id], 'files'=>true ]) !!}
                            <div class="form-group">
                                {!! Form::select('category_id', ['' => 'Select a category'] + $categories,null, ['class'=> 'form-control form-control-sm']) !!}
                                @if ($errors->has('category_id'))
                                    <div class="text-danger">
                                        <i>{{ $errors->first('category_id') }}</i>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::label('thumbnail', 'Thumbnail:') !!}
                                <label for="photo_id" class="custom-file">
                                    <input class="form-control form-control-sm" name="thumbnail" type="file"
                                           id="thumbnail">
                                    <span class="custom-file-control form-control form-control-sm"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                {!! Form::hidden('thumbnail_id', null, ['class'=>'form-control form-control-sm']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::text('item', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Product', 'autofocus']) !!}
                                @if ($errors->has('item'))
                                    <div class="text-danger">
                                        <i>{{ $errors->first('item') }}</i>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::text('price', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Price']) !!}
                                @if ($errors->has('price'))
                                    <div class="text-danger">
                                        <i>{{ $errors->first('price') }}</i>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::text('per', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Size']) !!}
                                @if ($errors->has('per'))
                                    <div class="text-danger">
                                        <i>{{ $errors->first('per') }}</i>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::number('quantity', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'Quantity', 'min' => 1, 'required' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Update', ['class' => 'btn btn-sm btn-custom btn-block']) !!}

                            </div>
                            {!! Form::close() !!}
                        @else
                            <div class="text-center alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i>
                                <br>
                                Click on the edit button to edit
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="header-content shadow">
                        <p>Add New Product</p>
                    </div>
                    <div class="dash-content shadow">
                        {!! Form::open(['route' => ['dashboard.addProduct'], 'files'=>true ]) !!}
                        <div class="form-group">
                            {!! Form::select('category_id', ['' => 'Select a category'] + $categories,null, ['class'=> 'form-control form-control-sm']) !!}
                            @if ($errors->has('category_id'))
                                <div class="text-danger">
                                    <i>{{ $errors->first('category_id') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">

                            {!! Form::label('thumbnail', 'Thumbnail:') !!}
                            <label for="photo_id" class="custom-file">
                                <input class="form-control form-control-sm" name="thumbnail" type="file"
                                       id="thumbnail">
                                <span class="custom-file-control form-control form-control-sm"></span>
                            </label>
                        </div>

                        <div class="form-group">
                            {!! Form::text('item', null, ['class'=> $errors->has('item') ? 'form-control form-control-sm error' : 'form-control form-control-sm', 'placeholder' => 'Product', ]) !!}
                            @if ($errors->has('item'))
                                <div class="text-danger">
                                    <i>{{ $errors->first('item') }}</i>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::text('price', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Price']) !!}
                            @if ($errors->has('price'))
                                <div class="text-danger">
                                    <i>{{ $errors->first('price') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('per') ? 'error' : ''}}">
                            {!! Form::text('per', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Per']) !!}
                            @if ($errors->has('per'))
                                <div class="text-danger">
                                    <i>{{ $errors->first('per') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::number('quantity', null, ['class'=> 'form-control form-control-sm', 'placeholder'=>'Quantity', 'min' => 1, 'required' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Add Product', ['class' => 'btn btn-sm btn-custom btn-block']) !!}

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('scripts')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.delete').on('submit', function (e) {
                let c = confirm('Are you sure?');
                if (c)
                    return true;
                else
                    e.preventDefault();
                return false;
            });
        });
    </script>
@stop