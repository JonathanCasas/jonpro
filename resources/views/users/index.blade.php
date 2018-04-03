@extends('layouts.jonpro')
@section('page_title','Users')

@section('content')
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <a href="{{route('users.create')}}" class="btn btn-success waves-effect">
        <i class="fa fa-plus"></i>
        <span>Add User</span>
    </a>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <h2>
                            All Users
                        </h2>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <div class="body table-responsive">
                    <form action="{{route('users.index')}}" method="GET" id="search">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="hidden" name="filter" value="filter">
                                        <input type="text" name="id" class="form-control" style="" value="{{$request->get('id')}}">
                                    </th>
                                    <th><input type="text" name="name" class="form-control" style="" value="{{$request->get('name')}}"></th>
                                    <th><input type="text" name="email" class="form-control" style="" value="{{$request->get('email')}}"></th>
                                    <th>
                                        <button type="submit" class="btn btn-dark btn-sm">
                                            <i class="fa fa-filter"></i>
                                        </button>
                                        <a class="btn btn-danger btn-sm" href="{{route('users.index')}}">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </th>
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
                                        <a href="{{route('users.edit',['user'=>$user])}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{route('users.show',['user'=>$user])}}" type="button" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </form>
                    @if($users->isEmpty())
                    <div>
                        No results found
                    </div>
                    @endif
                    <div>
                        {{$users->appends($request->all())->render()}}
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
        $('#clean').click(function () {
            $('.form-control').val('');
            $('#search').submit();
        });
    });
</script>
@endsection