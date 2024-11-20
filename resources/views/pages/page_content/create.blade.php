@extends('layouts.dashboard')

@section('title','Create Page contents')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/summernote.css')}}">
<!-- ico-font -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Page Contents </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Menu </li>
                    <li class="breadcrumb-item active">Main & Sub menu</li>
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
                    <span>Page, Menu and it`s content manipulation</span>
        
                    <div class="card-header-right">
                        <a href="/access/website/posts" class="btn btn-success btn-xs"><i class="fa fa-search-plus text-warning"></i> View Contents</a>
                        <ul class="list-unstyled card-option pull-right">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><a href="" class="icofont icofont-refresh reload-card"></a></li>
                        </ul>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.page_content.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save Content</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({height:250})

    $('.dropify').dropify({height:160});

    $('.mian_menu').on('change',function(){
        if ($(this).val().length > 0) {
            $.ajax({
               type: "get",url: "{{ url('/access/get-sub-menus') }}/" + $(this).val(),
               success: function(data) { $('.sub_menu').html(data);}
            });
        }
    });
  })
</script>
@endsection
