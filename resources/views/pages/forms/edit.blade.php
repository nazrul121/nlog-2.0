@extends('layouts.dashboard')

@section('title','Edit '.$form->title)
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Form</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Form </li>
                    <li class="breadcrumb-item active">Create a form</li>
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
                    <span>Page, Sliders and it`s content manipulation</span>
        
                    <div class="card-header-right">
                        <a href="{{url('/access/website/forms')}}" class="btn btn-success btn-xs"><i class="fa fa-search text-primary"></i> View forms</a>
                        <a href="{{url('/access/website/form-types')}}" class="btn btn-success btn-xs"><i class="fa fa-tags text-warning"></i> Form types</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.forms.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                    
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save form</button>
                        
                </div>
                </form>
            </div>
        </div>
    </div>
                
</div>
                
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('.mian_menu').on('change',function(){
        $.ajax({
           type: "get",url: "{{ url('/access/get-sub-menus') }}/" + $(this).val(),
           success: function(data) { $('.sub_menu').html(data);}
        });

        $('[name=table_title]').val( $(this).children("option:selected").text() + ' page' );
    });
  })
</script>
@endsection
