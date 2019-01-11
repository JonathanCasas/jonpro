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
                                    <th><input type="text" name="id" value="{{$request->get('id')}}"
                                               class="form-control"></th>
                                    <th><input type="text" name="name" value="{{$request->get('name')}}"
                                               class="form-control"></th>
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
                                    <th><input type="text" name="estimated_time"
                                               value="{{$request->get('estimated_time')}}" class="form-control"></th>
                                    <th><input type="text" name="start_date" value="{{$request->get('start_date')}}"
                                               placeholder="yyyy-mm-dd" class="form-control date"></th>
                                    <th><input type="text" name="end_date" value="{{$request->get('end_date')}}"
                                               placeholder="yyyy-mm-dd" class="form-control date"></th>
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
                                                <button class="btn btn-info btn-sm task" task="{{$task->id}}"
                                                        type="button">
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
    <div class="modal fade" id="update_task" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('task.project.update',['project'=>$project])}}" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">View Task</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="" id="txt-id">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Name</b>
                                    <div class="form-line">
                                        <input type="text" id="txt-name" readonly class="form-control" name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Type</b>
                                    <div class="form-line">
                                        <select name="type" disabled id="sl-type" readonly="" class="form-control jonpro-select" required="">
                                            <option value="">-- Select --</option>
                                            @foreach($types as $type)
                                                <option value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>State</b>
                                    <div class="form-line">
                                        <select name="state" id="sl-state" class="form-control jonpro-select"
                                                required="">
                                            <option value="">-- Select --</option>
                                            @foreach($states as $state)
                                                <option value="{{$state}}">{{$state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Priority</b>
                                    <div class="form-line">
                                        <select name="priority" disabled readonly="" id="sl-priority" class="form-control jonpro-select"
                                                required="">
                                            <option value="">-- Select --</option>
                                            @foreach($priorities as $priority)
                                                <option value="{{$priority}}">{{$priority}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Assigned To</b>
                                    <div class="form-line">
                                        <select name="assigned_to" disabled readonly="" id="sl-assigned_to" class="form-control users"
                                                required="">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Estimated time</b>
                                    <div class="form-line">
                                        <input type="text" readonly="" class="form-control" id="txt-estimated_time"
                                               name="estimated_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Start Date</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" id="txt-start_date"
                                               name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>End Date</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" id="txt-end_date" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <b>Commets</b>
                                    <div class="form-line">
                                        <textarea id="tinymce" name="comments"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect">Update</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/jonpro/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
//TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 100,
                plugins: [
                    '',
                    '',
                    '',
                    ''
                ],
                toolbar1: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ',
                toolbar2: '',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '/jonpro/tinymce';
        });
        $(document).ready(function () {
            $jp('.projects').select2("{{route('projects.search.select2')}}", "Projects");
            $('.date').inputmask("yyyy-mm-dd");
            $('.jonpro-select').select2({
                width: '100%'
            });
            $jp('.users').users("{{route('users.ajax.select2')}}", "Search Users");
            $('.date').inputmask("yyyy-mm-dd");
            $('.task').click(function () {
                var task = $(this).attr('task');
                $.ajax({
                    url: "{{route('tasks.ajax.get')}}",
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        id: task
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        var comments = data.comments;
                        comments = comments == null || comments == '' ? '' : comments;
                        $('#txt-id').val(data.id);
                        $('#txt-end_date').val(data.end_date);
                        $('#txt-estimated_time').val(data.estimated_time);
                        $('#txt-name').val(data.name);
                        $('#txt-start_date').val(data.start_date);
                        tinyMCE.activeEditor.setContent(comments);
                        $('#sl-priority').val(data.priority).trigger('change');
                        $('#sl-state').val(data.state).trigger('change');
                        $('#sl-type').val(data.type).trigger('change');
                        var assigned = {
                            id: data.assigned.id,
                            text: data.assigned.name
                        }
                        var opAssigned = new Option(assigned.text, assigned.id, true, true);
                        $('#sl-assigned_to').append(opAssigned).trigger('change');
                        $('#update_task').modal();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                    },
                    beforeSend: function (xhr) {
                        $('#preloader').show(200);
                    },
                    complete: function (jqXHR, textStatus) {
                        $('#preloader').hide(200);
                    }
                });
            });
        });
    </script>
@endsection
