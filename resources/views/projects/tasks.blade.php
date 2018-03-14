@extends('projects.information')
@section('active_tasks','active')
@section('tab_title')
Tasks &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">add</i>Add</button>
@endsection
@section('css')
<style>
    .select2-container--default .select2-selection--single {
        border: 0px solid #aaa !important; 
    }
</style>
@endsection
@section('tab_content')
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
</div>
@endsection
@section('js')
<!-- TinyMCE -->
<script src="{{asset('/material/plugins/tinymce/tinymce.js')}}"></script>
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
    tinyMCE.baseURL = '/material/plugins/tinymce';
});
$(document).ready(function () {
    $('.date').inputmask("yyyy-mm-dd");
    $('.jonpro-select').select2({
        width: '100%'
    });
    $jp('.users').users("{{route('users.ajax.select2')}}");
});
</script>
@endsection