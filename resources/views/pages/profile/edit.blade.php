@extends('layouts.dashboard')

@section('title','Edit '.Auth::user()->name)
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
                    <li class="breadcrumb-item active">{{Auth::user()->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="edit-profile">
        <form class="row" enctype="multipart/form-data" method="post">@csrf
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <input type="file" name="photo" class="dropify" data-default-file="{{url('/'.Auth::user()->photo)}}">
                            <span class="text-danger">{{ $errors->first('photo')}}</span>
                            <div class="col-md-12 pb-3 mt-3">
                                <div class="form-group row text-right m-0">
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 m-checkbox-inline mb-0 row">
                                            <div class="radio radio-primary">
                                                <input type="radio" name="sex" id="status1" value="male" @if(Auth::user()->sex=='male')checked @endif>
                                                <label for="status1" class="mb-0">Male</label>
                                            </div>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="sex" id="status2" value="female" @if(Auth::user()->sex=='male')checked @endif>
                                                <label for="status2" class="mb-0">Female</label>
                                            </div>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('sex')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Full name</label>
                                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile No</label>
                                    <input type="text" name="mobile" class="form-control" value="{{Auth::user()->mobile}}">
                                    <span class="text-danger">{{ $errors->first('mobile')}}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">eMail address</label>
                                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Address</label>
                                    <textarea rows="3" name="address" class="form-control" placeholder="address">{{Auth::user()->address}}</textarea>
                                    <span class="text-danger">{{ $errors->first('address')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Profile</button>
                    </div>
                </div>
            </div>
        </form> <br><br>
    </div>
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.dropify').dropify({height:160});
  })
</script>
@endsection
