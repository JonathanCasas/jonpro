@extends('layouts.jonpro')
@section('page_title','Projects')

@section('content')
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <a href="{{route('projects.create')}}" class="btn btn-success">
        <i class="fa fa-plus"></i>
        Add Project
    </a>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            All Projects
                        </h2>
                    </div>

                </div>
            </div>
            <div class="x_content">
                <div class="body table-responsive">
                    <form action="{{route('projects.index')}}" method="GET" id="search">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>State</th>
                                    <th>Priority</th>
                                    <th>Start Date</th>
                                    <th>Created By</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="hidden" name="filter" value="true">
                                        <input type="text" name="id" id="id" min="0" class="form-control" style="width: 4em" value="{{$request->get('id')}}">
                                    </th>
                                    <th><input type="text" name="name" id="name" class="form-control" style="width: 8em" value="{{$request->get('name')}}"></th>
                                    <th>
                                        <select class="form-control jonpro-select" name="state" id="state">
                                            <option value="">--Select--</option>
                                            @foreach($states as $state)
                                            <option value="{{$state}}" {{$state==$request->get('state')?'selected':''}}>{{$state}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control jonpro-select" name="priority" id="priority">
                                            <option value="">--Select--</option>
                                            @foreach($priorities as $priority)
                                            <option value="{{$priority}}" {{$priority==$request->get('priority')?'selected':''}}>{{$priority}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th><input type="text" name="start_date" id="start_date" class="form-control date" style="width: 8em" value="{{$request->get('start_date')}}"></th>
                                    <th>
                                        <select class="form-control users" name="created_by" id="created_by">
                                            @if(!is_null($createdBy))
                                            <option value="{{$createdBy->id}}" selected="">{{$createdBy->name}}</option>
                                            @endif
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control companies" id="company" name="company">
                                            @if(!is_null($company))
                                            <option value="{{$company->id}}" selected="">{{$company->name}}</option>
                                            @endif
                                        </select>
                                    </th>
                                    <th>
                                        <button class="btn btn-dark btn-sm" type="submit">
                                            <i class="fa fa-filter"></i>
                                        </button>
                                        <a class="btn btn-danger btn-sm" href="{{route('projects.index')}}">
                                            <i class="fa fa-dashcube"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($projects->isNotEmpty())
                                @foreach($projects as $project)
                                <tr>
                                    <th scope="row">{{$project->id}}</th>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->state}}</td>
                                    <td>{{$project->priority}}</td>
                                    <td>{{!is_null($project->start_date)?$project->start_date->format('Y-m-d'):''}}</td>
                                    <td>{{$project->creator->name}}</td>
                                    <td>{{$project->company->name}}</td>
                                    <td>
                                        <a href="{{route('projects.edit',['project'=>$project])}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{route('projects.show',['project'=>$project])}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </form>
                    @if($projects->isEmpty())
                    <div>
                        No results found
                    </div>
                    @endif
                    <div>
                        {{$projects->appends($request->all())->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.date').inputmask("yyyy-mm-dd");
        $jp('.companies').companies("{{route('companies.ajax.select2')}}");
        $jp('.users').users("{{route('users.ajax.select2')}}", "Search users");
        $('.jonpro-select').select2({
            width: '100%'
        });
        $('.reset').click(function () {
            $('.form-control').val('');
            $('#state,#priority,#created_by,#company').val([]).trigger('change');
            //location.reload(false);
            $('#search').submit();
            //window.location = window.location;
            //$('#id,#name,#state,#priority,#start_date,#created_by,#company').val('');
        });
    });
</script>

@endsection