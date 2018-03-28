@extends('layouts.jonpro')
@section('page_title','Users')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    New User
                </h2>
            </div>
            <div class="x_content">
                <form action="{{route('users.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Name</b>
                                        <div class="form-line">
                                            <input type="text" required="" class="form-control" name="name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Email</b>
                                        <div class="form-line">
                                            <input type="email" required="" class="form-control" name="email" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Password</b>
                                        <div class="form-line">
                                            <input type="password" required="" class="form-control" name="password" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Password</b>
                                        <div class="form-line">
                                            <input type="password" required="" class="form-control" name="password_confirmation" required="">
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