@extends('layouts.dashboard')

@section('title','Edit general info')
@section('content')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Edit System information</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">System info </li>
                    <li class="breadcrumb-item active">Edit information</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="edit-profile">
        <form class="row " method="post" enctype="multipart/form-data"> @csrf
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <label>Company Logo [size: 150x46px]</label>
                        <input type="file" name="logo" class="dropify"  data-default-file="{{url($company_info->logo)}}">
                        <span class="text-danger">{{ $errors->first('logo')}}</span> 

                        <label>Browser Favicon</label>
                        <input type="file" name="favicon" class="dropify"  data-default-file="{{url($company_info->favicon)}}">
                        <span class="text-danger">{{ $errors->first('favicon')}}</span> 
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Company informatin </h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="name"  value="{{$company_info->name}}">
                                    <span class="text-danger">{{ $errors->first('name')}}</span> 
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{$company_info->email}}"><span class="text-danger">{{ $errors->first('email')}}</span> 
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contact No</label>
                                    <input type="text" class="form-control" name="phone" value="{{$company_info->phone}}"><span class="text-danger">{{ $errors->first('phone')}}</span> 
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Open time</label>
                                    <input type="text" class="form-control" name="open_time" value="{{$company_info->open_time}}"><span class="text-danger">{{ $errors->first('open_time')}}</span> 
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Off Day</label>
                                    <input type="text" class="form-control" name="off_day" value="{{$company_info->off_day}}"><span class="text-danger">{{ $errors->first('off_day')}}</span> 
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Web URL</label>
                                    <input type="text" class="form-control" name="website" value="{{$company_info->website}}"><span class="text-danger">{{ $errors->first('website')}}</span> 
                                </div>
                            </div>
                             <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Physical Location</label>
                                    <textarea class="form-control" name="address" rows="3">{{$company_info->address}}</textarea>
                                    <span class="text-danger">{{ $errors->first('address')}}</span> 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.dropify').dropify({height:200});
  })
</script>
@endsection
