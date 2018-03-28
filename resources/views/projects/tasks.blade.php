@extends('projects.information')
@section('active_tasks','active')
@section('tab_title')
Tasks &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success w" data-toggle="modal" data-target="#largeModal"><i class="fa fa-plus"></i> Add</button>
@endsection
@section('tab_content')
<div id="preloader">
    <div class="preloader">
        <div class="spinner-layer pl-light-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
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
                <th>State</th>
                <th>Priority</th>
                <th>Assigned To</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Estiated time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks->isNotEmpty())
            @foreach($tasks as $task)
            <tr>
                <th class="row">{{$task->id}}</th>
                <td>{{$task->name}}</td>
                <td>{{$task->type}}</td>
                <td>{{$task->state}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->assigned->name}}</td>
                <td>{{!is_null($task->start_date)?$task->start_date->format('Y-m-d'):''}}</td>
                <td>{{!is_null($task->end_date)?$task->end_date->format('Y-m-d'):''}}</td>
                <td>{{$task->estimated_time}}</td>
                <td>
                    <button class="btn btn-info btn-sm task" task="{{$task->id}}">
                        <i class="fa fa-pencil"></i>
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
    @else
    <div>
        {{$tasks->render()}}
    </div>
    @endif

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('tasks.store',['project'=>$project])}}" method="POST" >
                    <div class="modal-header">
                        <h4 class="modal-title" id="largeModalLabel">New Task</h4>
                    </div>
                    <div class="modal-body">

                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Name</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Type</b>
                                    <div class="form-line">
                                        <select name="type" class="form-control jonpro-select" required="">
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
                                        <select name="state" class="form-control jonpro-select" required="">
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
                                        <select name="priority" class="form-control jonpro-select" required="">
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
                                        <select name="assigned_to" class="form-control users" required="">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Estimated time</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="estimated_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Start Date</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>End Date</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" name="end_date">
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
                        <button type="submit" class="btn btn-success waves-effect">Create</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update_task" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('task.project.update',['project'=>$project])}}" method="POST" >
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
                                        <input type="text" id="txt-name" class="form-control" name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Type</b>
                                    <div class="form-line">
                                        <select name="type" id="sl-type" class="form-control jonpro-select" required="">
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
                                        <select name="state" id="sl-state" class="form-control jonpro-select" required="">
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
                                        <select name="priority" id="sl-priority" class="form-control jonpro-select" required="">
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
                                        <select name="assigned_to" id="sl-assigned_to" class="form-control users" required="">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Estimated time</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txt-estimated_time" name="estimated_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <b>Start Date</b>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" id="txt-start_date" name="start_date">
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
</div>
@endsection
@section('js')
<!-- TinyMCE -->
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
    $('#preloader').hide(200);
    $('.date').inputmask("yyyy-mm-dd");
    $('.jonpro-select').select2({
        width: '100%'
    });
    $jp('.users').users("{{route('users.ajax.select2')}}");
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