@extends('layouts.jonpro')
@section('page_title','Projects')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    New Project
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('projects.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
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
                                        <b>State</b>
                                        <div class="form-line">
                                            <select name="state" class="form-control jonpro-select" required="">
                                                <option value="">Select</option>
                                                @foreach($states as $state)
                                                <option value="{{$state}}">{{$state}}</option>
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
                                                <option value="{{$priority}}">{{$priority}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Start Date</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="start_date">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>End Date</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" name="end_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Company</b>
                                        <div class="form-line">
                                            <select name="company_id" class="form-control companies">
                                                <option value=""></option>
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
                                            <textarea id="tinymce" name="description"></textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect">
                        <i class="fa fa-save"></i>
                        SAVE
                    </button>
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
    tinyMCE.baseURL = '/jonpro/tinymce';
});
$(document).ready(function () {
    $('.date').inputmask("yyyy-mm-dd");
    $jp('.companies').companies("{{route('companies.ajax.select2')}}");
    $('.jonpro-select').select2({
        width: '100%'
    });
});
</script>
@endsection