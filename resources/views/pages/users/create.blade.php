@extends('layouts.dashboard')

@section('title','Create new user')
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Deploy Users</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Users </li>
                    <li class="breadcrumb-item active">New User</li>
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
                    <span>Create new user for the system</span>

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
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.dropify').dropify({height:160});
  })
</script>
@endsection
