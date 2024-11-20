@extends('layouts.dashboard')

@section('title','Company information')
@section('content')

@inject('subMenuM','\App\Models\Sub_menu')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Organization info
                    <small>General information of the system</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">Company Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <div class="col-sm-12">
                <div class="card hovercard text-center">
                    
                    <div class="user-image">
                        <div class="avatar">
                            <img alt="" src="{{url($info->logo)}}">
                        </div>
                        <div class="icon-wrapper"> <a href="{{ url('/access/company/edit-info/'.$info->id) }}">
                            <i class="icofont icofont-pencil-alt-5"></i> </a></div>
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ttl-info text-left">
                                            <h6><i class="fa fa-envelope"></i> Email</h6>
                                            <span>{{$info->email}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                <div class="user-designation">
                                    <div class="title">
                                        <a href="#">{{$info->name}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ttl-info text-right">
                                            <h6><i class="fa fa-phone"></i> Contact No.</h6>
                                            <span> {{$info->phone}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="social-media">
                            <ul class="list-inline">
                                @foreach($social_info as $social)
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="follow">
                           {{$info->address}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection