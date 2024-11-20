@extends('layouts.dashboard')

@section('title','Edit '.$slider->title)
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/summernote.css')}}">
<!-- ico-font -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Sliders</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Sliders </li>
                    <li class="breadcrumb-item active">Edit slider</li>
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
                    <span>Edit Slider and manipulation it`s content </span>
        
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.sliders.form')
                    </div>    
                </div>
                <div class="card-footer pull-right mb-3">
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-edit"></i> Update Slider</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                
</div>
@endsection
