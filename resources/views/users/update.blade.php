@extends('layouts.jonpro')
@section('block_header','Users')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    User: {{$user->name}}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('users.update',['user'=>$user])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Name</b>
                                        <div class="form-line">
                                            <input type="text" required="" class="form-control" name="name" required="" value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Email</b>
                                        <div class="form-line">
                                            <input type="email" required="" class="form-control" name="email" required="" value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Password</b>
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Password</b>
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect">
                        <i class="fa fa-save"></i>
                        SAVE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection