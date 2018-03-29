@extends('layouts.jonpro')
@section('page_title','Companies')

@section('content')
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <a href="{{route('companies.create')}}" class="btn btn-success waves-effect">
        <i class="fa fa-plus"></i>
        Add Company
    </a>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            All Companies
                        </h2>
                    </div>
                </div>

            </div>
            <div class="x_content">
                <div class="body table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Nit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($companies->isNotEmpty())
                            @foreach($companies as $company)
                            <tr>
                                <th scope="row">{{$company->id}}</th>
                                <td>{{$company->name}}</td>
                                <td>{{$company->nit}}</td>
                                <td>
                                    <a href="{{route('companies.edit',['company'=>$company])}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{route('companies.show',['company'=>$company])}}" type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if($companies->isEmpty())
                    <div>
                        No results found
                    </div>
                    @endif
                    <div>
                        {{$companies->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection