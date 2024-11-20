@extends('layouts.dashboard')

@section('title','Create Fun Factor')
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Create Fun Factor
                    <small>Manipulate Fun Factor  (an statistics) for a page</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"> Dashboard</i></a></li>
                    <li class="breadcrumb-item">Fun factors</li>
                    <li class="breadcrumb-item active">Create factor</li>
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
                    <span>Create new factor/statistic for the a page</span>

                    <div class="card-header-right">
                        <a href="{{url('/access/website/fun-factors')}}" class="btn btn-outline-warning rounted btn-xs pull-right"><i class="icon-link text-primary"></i> View Fun-factors</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.fun_factor.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save Factor</button>
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
    $('.mian_menu').on('change',function(){
        $.ajax({
           type: "get",url: "{{ url('/access/get-sub-menus') }}/" + $(this).val(),
           success: function(data) { $('.sub_menu').html(data);}
        });
    });
  })
</script>
@endsection
