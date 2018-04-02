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
                    <form action="{{route('home.alltasks')}}" method="GET">
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
                                <tr>
                                    <th><input type="text" name="id" value="{{$request->get('id')}}" class="form-control"></th>
                                    <th><input type="text" name="name" value="{{$request->get('name')}}" class="form-control"></th>
                                    <th>
                                        <select name="type" class="form-control jonpro-select">
                                            <option value="">-- Select --</option>
                                            @foreach($types as $type)
                                            <option value="{{$type}}" {{$type==$request->get('type')?'selected':''}}>{{$type}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <select name="priority" class="form-control jonpro-select">
                                            <option value="">-- Select --</option>
                                            @foreach($priorities as $priority)
                                            <option value="{{$priority}}" {{$priority==$request->get('priority')?'selected':''}}>{{$priority}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        @php
                                        $project=null;
                                        if($request->has('project')&&!is_null($request->get('project'))){
                                        $project=\App\Models\Project::find($request->get('project'));
                                        }  
                                        @endphp
                                        <select class="form-control projects" name="project">
                                            @if(!is_null($project))
                                            <option value="{{$project->id}}" selected="">{{$project->name}}</option>
                                            @endif
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control" name="state">
                                            <option value="">--Select--</option>
                                            @foreach($states as $state)
                                            <option value="{{$state}}" {{$state==$request->get('state')?'selected':''}}>{{$state}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th><input type="text" name="estimated_time" value="{{$request->get('estimated_time')}}" class="form-control"></th>
                                    <th><input type="text" name="start_date" value="{{$request->get('start_date')}}" placeholder="yyyy-mm-dd" class="form-control date"></th>
                                    <th><input type="text" name="end_date" value="{{$request->get('end_date')}}" placeholder="yyyy-mm-dd" class="form-control date"></th>
                                    <th>
                                        <button type="submit" name="filter" value="true" class="btn btn-dark btn-sm">
                                            <i class="fa fa-filter"></i>
                                        </button>
                                    </th>
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
                                    <td>{{!is_null($task->start_date)?$task->start_date->format('Y-m-d'):''}}</td>
                                    <td>{{!is_null($task->end_date)?$task->end_date->format('Y-m-d'):''}}</td>
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
                    </form>
                    @if($tasks->isEmpty())
                    <div>
                        No results found
                    </div>
                    @endif
                    <div>
                        {{$tasks->appends($request->only(['id', 'name', 'type', 'priority', 'project', 'filter','state','stimated_time','start_date','end_date']))->render()}}
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
        $jp('.projects').select2("{{route('projects.search.select2')}}", "Projects");
        $('.date').inputmask("yyyy-mm-dd");
    });

</script>
@endsection
