@extends('layouts.admin')
@section('block_header','Home')

@section('content')
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            pending tasks
                        </h2>
                    </div>
                </div>
            </div>
            <div class="body table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Priority</th>
                            <th>Proyect</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($tasks->isNotEmpty())
                        @foreach($tasks as $task)
                        <tr>
                            <th class="row">{{$task->id}}</th>
                            <td>{{$task->name}}</td>
                            <td>{{$task->type}}</td>
                            <td>{{$task->priority}}</td>
                            <td>{{$task->project->name}}</td>
                            <td>
                                <button class="btn btn-info waves-effect btn-xs">
                                    <i class="material-icons">remove_red_eye</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if($tasks->isEmpty())
                <div>
                    No results found
                </div>
                @endif
                <div>
                    {{$tasks->render()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            pending tasks <b>{{\Carbon\Carbon::now()->format('Y-m-d')}}</b>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="body table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Priority</th>
                            <th>Proyect</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dayTasks->isNotEmpty())
                        @foreach($dayTasks as $task)
                        <tr>
                            <th class="row">{{$task->id}}</th>
                            <td>{{$task->name}}</td>
                            <td>{{$task->type}}</td>
                            <td>{{$task->priority}}</td>
                            <td>{{$task->project->name}}</td>
                            <td>
                                <button class="btn btn-info waves-effect btn-xs">
                                    <i class="material-icons">remove_red_eye</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if($dayTasks->isEmpty())
                <div>
                    No results found
                </div>
                @endif
                <div>
                    {{$dayTasks->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection