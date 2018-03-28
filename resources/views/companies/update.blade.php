@extends('layouts.jonpro')
@section('page_title','Companies')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    Company {{$company->name}}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('companies.update',['company'=>$company])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Name</b>
                                        <div class="form-line">
                                            <input type="text" required="" class="form-control" name="name" required="" value="{{$company->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Nit</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nit" value="{{$company->nit}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection