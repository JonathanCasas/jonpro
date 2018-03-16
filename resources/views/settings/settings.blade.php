@extends('layouts.admin')
@section('block_header','Settings')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Settings
                </h2>
            </div>
            <div class="body">
                <form action="{{route('settings.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Site Name</b>
                                        <div class="form-line">
                                            <input type="text" required="" class="form-control" name="site_name" value="{{$setting->site_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Site Title</b>
                                        <div class="form-line">
                                            <input type="text" required="" class="form-control" name="site_title" value="{{$setting->site_title}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Lang</b>
                                        <div class="form-line">
                                            <select class="form-control" name="lang">
                                                <option value="">-- Select --</option>
                                                <option value="en" {{$setting->lang=='en'?'selected':''}}>English</option>
                                                <option value="es" {{$setting->lang=='es'?'selected':''}}>Spanish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <b>Background</b>
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="image_background">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection