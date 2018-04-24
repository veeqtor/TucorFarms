@extends('layouts.login')
@section('title')
    Tucor Farm | Login
@endsection
@section('content')
    <div class="form-content ">
        <div class="login-form">
            <h3 class="lead text-center pb-4">Log in to continue</h3>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                @if ($errors->has('email'))
                    <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control form-control-sm" name="email"
                           value="{{ old('email') }}" required
                           autofocus placeholder="Enter email">
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
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                            Me
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-sm btn-custom">
                        Login
                    </button>
                </div>

                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a><br>
                    <small>Do not have an account?</small>
                    <a href="{{route("register")}}">Signup</a><br>
                    <a href="{{url("/")}}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
