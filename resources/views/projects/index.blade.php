@extends('layouts.admin')
@section('block_header','Projects')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            All Projects
                        </h2>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <a href="{{route('projects.create')}}" class="btn btn-success waves-effect">
                            <i class="material-icons">library_add</i>
                            <span>Add Project</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="body table-responsive">

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
                    </thead>
                    <tbody>
                        @if($projects->isNotEmpty())
                        @foreach($projects as $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td>{{$project->name}}</td>
                            <td>{{$project->state}}</td>
                            <td>{{$project->priority}}</td>
                            <td>{{$project->start_date->format('Y-m-d')}}</td>
                            <td>{{$project->creator->name}}</td>
                            <td>{{$project->company->name}}</td>
                            <td>
                                <a href="{{route('projects.edit',['project'=>$project])}}" class="btn bg-amber waves-effect btn-xs">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="{{route('projects.show',['project'=>$project])}}" type="button" class="btn bg-info waves-effect btn-xs">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if($projects->isEmpty())
                <div>
                    No results found
                </div>
                @endif
                <div>
                    {{$projects->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
