@extends('layouts.dashboard')

@section('title','Edit partner info')
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Edit Partner information</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Partner </li>
                    <li class="breadcrumb-item active">New Partner</li>
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
                    <span>Create new clinet for the organization</span>

                    <div class="card-header-right">
                        <a href="/access/partner/index" class="btn btn-warning btn-xs"><i class="icon-user text-primary"></i> View Clinet list</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body megaoptions-border-space-sm">
                        <div class="row">
                        @include('pages.partners.form')
                        </div>    
                    </div>
                    <div class="card-footer text-right mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 text-right">   
                                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-edit"></i> Update Partner info</button>
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>     
</div>
                
@endsection
