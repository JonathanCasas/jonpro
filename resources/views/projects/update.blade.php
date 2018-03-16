@extends('layouts.admin')
@section('block_header','Projects')
@section('css')
<style>
    .select2-container--default .select2-selection--single {
        border: 0px solid #aaa !important; 
    }
</style>
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Project {{$project->name}}
                </h2>
            </div>
            <div class="body">
                <form action="{{route('projects.update',['project'=>$project])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Name</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" required="" value="{{$project->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>State</b>
                                        <div class="form-line">
                                            <select name="state" class="form-control jonpro-select" required="">
                                                <option value="">Select</option>
                                                @foreach($states as $state)
                                                <option value="{{$state}}" {{$project->state==$state?'selected':''}}>{{$state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Priority</b>
                                        <div class="form-line">
                                            <select name="priority" class="form-control jonpro-select" required="">
                                                <option value="">Select</option>
                                                @foreach($priorities as $priority)
                                                <option value="{{$priority}}" {{$project->priority==$priority?'selected':''}}>{{$priority}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Start Date</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="start_date" value="{{!is_null($project->start_date)?$project->start_date->format('Y-m-d'):''}}">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>End Date</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="end_date" value="{{!is_null($project->end_date)?$project->end_date->format('Y-m-d'):''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Company</b>
                                        <div class="form-line">
                                            <select name="company_id" class="form-control companies">
                                                <option value="{{$project->company->id}}">{{$project->company->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <b>Files</b>
                                        <div class="form-line">
                                            <input type="file" class="form-control" readonly="" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <b>Description</b>
                                        <div class="form-line">
                                            <textarea id="tinymce" name="description">{{$project->description}}</textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect">
                        <i class="material-icons">save</i>
                        <span>Save</span>
                    </button>
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
        height: 150,
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
    $jp('.companies').companies("{{route('companies.ajax.select2')}}");
    $('.jonpro-select').select2({
        width: '90%'
    });
});
</script>
@endsection