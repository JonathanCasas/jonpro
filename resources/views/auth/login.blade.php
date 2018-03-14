@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b>BSB</b></a>
        <small>Admin BootStrap Based - Material Design</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{route('login')}}">
                {{csrf_field()}}
                <div class="msg">Sign in to start your session</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line {{ $errors->has('email')?'error':''}}">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required autofocus>
                    </div>
                    @if($errors->has('email'))
                    <label id="email-error" class="error" for="email">{{ $errors->first('email') }}.</label>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    @if($errors->has('password'))
                    <label id="name-error" class="error" for="name">{{ $errors->first('email') }}.</label>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink" {{old('remember')?'checked':''}}>
                        <label for="rememberme">{{ __('Remember Me') }}</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="sign-up.html">Register Now!</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="forgot-password.html">{{ __('Forgot Your Password?')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection