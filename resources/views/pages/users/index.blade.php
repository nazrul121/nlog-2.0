@extends('layouts.dashboard')

@section('title','Users table')
@section('content')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Users
                    <small>Manipulate Users of the system</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Users </li>
                    <li class="breadcrumb-item active">Users Record</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    	<div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <span>All Users records - those who run the sytem
                    @if(Auth::user()->role=='admin')
                    <a href="#" data-toggle="modal" data-target="#createUser" class="btn btn-outline-warning rounted btn-xs pull-right">  <i class="icon-user"></i> Create User  </a>@endif
                   </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Image</th> <th scope="col">Users Name</th>
                                <th scope="col">Email</th><th scope="col">Role</th><th scope="col">Status</th><th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->count()>0)
                                @foreach($users as $key=>$row)
                                <tr>
                                    <th class="bd-t-none" scope="row"><img src="{{$row->photo}}" style="height:45px"></th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->role}}</td>
                                    <td>
                                        @if($row->status=='1') Active @else Inactive @endif
                                    </td>
                                    <td class="text-right">
                                        @if(Auth::user()->role=='admin')
                                        <a href="/access/user/edit-user/{{$row->id}}"><i class="fa fa-edit"></i></a>@endif
                                    </td>
                                </tr> @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal to create !-->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="width:90%">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post" enctype="multipart/form-data"> @csrf
                    <div class="card-header"> <h5>Create new user for the system</h5> </div>
                    <div class="card-body">
                        @include('pages.users.form')
                    </div>
                    <div class="card-footer mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8 text-right">
                                    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                        <label class="col-form-label pt-0">Access Role</label> &nbsp; &nbsp; 
                                        <div class="radio radio-primary">
                                            <input type="radio" name="role" id="radioinline13" value="admin">
                                            <label for="radioinline13" class="mb-0">Administrator</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input type="radio" name="role" id="radioinline23" value="moderator"checked="">
                                            <label for="radioinline23" class="mb-0">Moderator</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-danger"></small>
                                </div>
                                <div class="col-md-4 text-right">   
                                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save User</button>
                                </div>
                            </div>  
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
        $('.dropify').dropify({height:160});

        @if(Session::has('create_user')) $('#createUser').modal('show'); @endif
    })
</script>
@endsection