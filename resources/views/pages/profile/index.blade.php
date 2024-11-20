@extends('layouts.dashboard')

@section('title','MY PROFILE')

@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Profile
                    <small>Keep your profile up to date</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Dashboard</i></a></li>
                    <li class="breadcrumb-item">Profile </li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <!--user profile first-style start-->
            <div class="col-sm-12">
                <div class="card hovercard text-center">
                    
                    <div class="user-image">
                        <div class="avatar">
                            <img alt="" src="{{url('/'.Auth::user()->photo)}}">
                        </div>
                        <div class="icon-wrapper">
                            <a href="{{url('/access/edit-profile/'.Auth::user()->id)}}"><i class="icofont icofont-pencil-alt-5"></i></a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ttl-info text-left">
                                            <h6><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email</h6>
                                            <span>{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ttl-info text-left">
                                            <h6><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;Role assign date</h6>
                                            <span>{{date('d F Y',strtotime(Auth::user()->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                <div class="user-designation">
                                    <div class="title">
                                        <a target="_blank" href="#">{{Auth::user()->name}}</a>
                                    </div>
                                    <div class="desc mt-2">{{Auth::user()->role}}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ttl-info text-left">
                                            <h6><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;Contact No</h6>
                                            <span>{{Auth::user()->mobile}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ttl-info text-left">
                                            <h6><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;Location</h6>
                                            <span>{{Auth::user()->address}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
        $('.dropify').dropify({height:160});
    })
</script>
@endsection