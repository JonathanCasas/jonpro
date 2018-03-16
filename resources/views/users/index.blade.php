@extends('layouts.admin')
@section('block_header','Users')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            All Users
                        </h2>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <a href="{{route('users.create')}}" class="btn btn-success waves-effect">
                            <i class="material-icons">library_add</i>
                            <span>Add User</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="body table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->isNotEmpty())
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('users.edit',['user'=>$user])}}" class="btn bg-amber waves-effect btn-xs">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="{{route('users.show',['user'=>$user])}}" type="button" class="btn bg-info waves-effect btn-xs">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if($users->isEmpty())
                <div>
                    No results found
                </div>
                @endif
                <div>
                    {{$users->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection