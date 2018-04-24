@extends('layouts.login')
@section('title')
    Tucor Farm | Register
@endsection

@section('content')
    <div class="form-content ">
        <div class="reg-form">
            <h3 class="lead text-center pb-4">Create an Account</h3>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                    <input type="text" class="form-control form-control-sm" name="fname"
                           value="{{ old('fname') }}"
                           required
                           placeholder="First Name"
                           autofocus>
                    @if ($errors->has('fname'))
                        <span class="text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                    <input type="text" class="form-control form-control-sm" name="lname"
                           value="{{ old('lname') }}"
                           required
                           placeholder="Last Name">
                    @if ($errors->has('lname'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <select id="gender" name="gender" class="text-center form-control form-control-sm">
                        <option>-Select gender-</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="emailHelp" type="email" class="form-control form-control-sm" name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter a valid Email address" required>
                    <small id="emailHelp" class="form-text text-muted">
                        We'll never share your email with anyone else.
                    </small>
                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control form-control-sm" name="password"
                           placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control form-control-sm"
                           name="password_confirmation"
                           placeholder="Confirm Password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-sm btn-custom">
                        Sign up
                    </button>
                </div>
                <div class="form-group">
                    <small>Have an account?</small>
                    <br>
                    <a href="{{route("login")}}">Proceed to login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
