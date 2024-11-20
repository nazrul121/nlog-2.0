@extends('layouts.dashboard')

@section('title','Edit '.$user->name)
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Update User info</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Dashbaord</i></a></li>
                    <li class="breadcrumb-item">Edit user </li>
                    <li class="breadcrumb-item active">{{$user->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12">
          
            <div class="card">
                <div class="card-header">
                    <span>Edit <b>{{$user->name}}</b> info</span>

                    <div class="card-header-right">
                        <a href="/access/user/users" class="btn btn-warning btn-xs"><i class="icon-user text-primary"></i> View Users</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.users.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 text-right">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <label class="col-form-label pt-0">Access Role</label> &nbsp; &nbsp; 
                                    <div class="radio radio-primary">
                                        <input type="radio" name="role" id="role1" value="admin" required="" @if($user->role=='admin') checked @endif>
                                        <label for="role1" class="mb-0">Administrator</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="role" id="role2" value="moderator" required="" @if($user->role=='moderator') checked @endif>
                                        <label for="role2" class="mb-0">Moderator</label>
                                    </div>
                                </div>
                                <small class="form-text text-danger"></small>
                            </div>
                            <div class="col-md-4 text-right">   
                                <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-edit"></i> Update User info</button>
                            </div>
                        </div>  
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
                
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.dropify').dropify({height:160});
  })
</script>
@endsection
