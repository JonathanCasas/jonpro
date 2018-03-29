@extends('layouts.layout')
@section('main')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6 center-block">
        <br>
        <br>
        <br>
        <div class="x_panel panel_jonpro">
            <div class="x_title">
                <h2>{{Jonpro::getSiteName()}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="sign_in" method="POST" action="{{route('login')}}">
                    {{csrf_field()}}
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
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
                            <i class="fa fa-key"></i>
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
                            <button class="btn btn-success btn-lg" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-right">
                            <a href="{{route('password.request')}}">{{ __('Forgot Your Password?')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>

</div>
@endsection