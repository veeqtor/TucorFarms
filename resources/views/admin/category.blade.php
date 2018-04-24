@extends('layouts.admin')

@section('side-nav')
    <div class="side-nav">
        <ul class="side-nav-links">
            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="active">
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
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('cUpdate') || session()->has('cAdd') || session()->has('cDel'))
                <div class="text-center alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-info-circle"></i>
                    {{session('cUpdate')}}
                    {{session('cAdd')}}
                    {{session('cDel')}}
                </div>
            @endif
        </div>
        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="dash-content shadow my-3 categories">
                    <h4>{{$category->type}}</h4>
                    <hr>
                    <ul>
                        @php($count = 0)
                        @foreach($category->product as $product)
                            <li class="text-muted"><p><i>{{$product->item}}</i></p></li>
                            @php($count++)
                            @if($count === 2)
                                @break
                            @endif
                        @endforeach
                        <li class="text-muted"><h6>...</h6></li>
                    </ul>

                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-sm btn-block btn-custom"
                               href="{{route('dashboard.editCategory', $category->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            {!! Form::open(['method'=> 'DELETE','route' => ['dashboard.deleteCategory', $category->id ],'class'=> 'delete' ])!!}

                            {!!Form::button('<i class ="fa fa-trash"></i>',['type' => 'submit', 'class'=> 'btn btn-danger btn-sm btn-block', 'style'=>'font-size: 0.7rem'])!!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="header-content">
                <p>Edit Category</p>
            </div>
            <div class="dash-content shadow">
                @if(isset($editCategory))
                    {!! Form::model($editCategory, ['method' => 'PATCH',  'route' => ['dashboard.updateCategory', $editCategory->id], 'files'=>true ]) !!}
                    <div class="form-group">
                        {!! Form::text('type', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Category', 'autofocus']) !!}
                        @if ($errors->has('type'))
                            <div class="text-danger">
                                <i>{{ $errors->first('type') }}</i>
                            </div>
                        @endif
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
        <div class="col-md-6">
            <div class="header-content">
                <p>Add New Category</p>
            </div>
            <div class="dash-content shadow">
                {!! Form::open(['route'=> 'dashboard.addCategory','files'=>true ]) !!}
                <div class="form-group">
                    {!! Form::text('type', null, ['class'=> 'form-control form-control-sm', 'placeholder' => 'Category']) !!}
                    @if ($errors->has('type'))
                        <div class="text-danger">
                            <i>{{ $errors->first('type') }}</i>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::submit('Add Category', ['class' => 'btn btn-sm btn-custom btn-block']) !!}

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('.delete').on('submit', function (e) {
                let c = confirm('Are you sure you want to delete this category and all its contents?');
                if (c)
                    return true;
                else
                    e.preventDefault();
                return false;
            });
        });
    </script>
@stop