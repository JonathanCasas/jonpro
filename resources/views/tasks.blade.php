@extends('layouts.jonpro')
@section('page_title','Home')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    {{__('home.pending_tasks')}}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{__('home.table.id')}}</th>
                                <th>{{__('home.table.name')}}</th>
                                <th>{{__('home.table.type')}}</th>
                                <th>{{__('home.table.priority')}}</th>
                                <th>{{__('home.table.project')}}</th>
                                <th>{{__('home.table.state')}}</th>
                                <th>{{__('home.table.estimated_time')}}</th>
                                <th>{{__('home.table.start_date')}}</th>
                                <th>{{__('home.table.end_date')}}</th>
                                <th>{{__('home.table.action')}}</th>
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
                                <td>{{$task->state}}</td>
                                <td>{{$task->estimated_time}}</td>
                                <td>{{$task->start_date}}</td>
                                <td>{{$task->end_date}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm task" task="{{$task->id}}">
                                        <i class="fa fa-eye"></i>
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
    </div>
</div>
@endsection
