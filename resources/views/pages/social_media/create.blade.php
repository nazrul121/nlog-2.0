@extends('layouts.dashboard')

@section('title','Add social media')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Add social media</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Social media </li>
                    <li class="breadcrumb-item active">New media</li>
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
                        <a href="{{url('/access/company/company-social-info')}}" class="btn btn-warning btn-xs"><i class="icon-like text-primary"></i>View social media</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.social_media.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save media info</button>  
                </div>
                </form>
            </div>
        </div>
    </div>
                
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.fa').on('click',function(){
        // alert( $(this).attr('class') )
        var $span = $('span.setIcon');
        $span.attr('class', 'setIcon');
        
        $('.setIcon').addClass( $(this).attr('class') );
        
        $('[name=media_icon]').val($(this).attr('class'));
    })
  })
</script>
@endsection
