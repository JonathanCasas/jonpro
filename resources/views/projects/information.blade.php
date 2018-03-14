@extends('layouts.admin')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Project <b>{{$project->name}}</b>
                </h2>
            </div>
            <div class="body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="@yield('active_tasks')">
                        <a href="{{route('tasks.index',['project'=>$project])}}">
                            <i class="material-icons">folder_open</i> Tasks
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#profile_with_icon_title">
                            <i class="material-icons">forum</i> Comments
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#messages_with_icon_title">
                            <i class="material-icons">comment</i> Tickets
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                        <b>@yield('tab_title')</b>
                        <p>
                            @yield('tab_content')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection