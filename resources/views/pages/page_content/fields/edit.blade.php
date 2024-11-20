@extends('layouts.dashboard')

@section('title','Edit '.$field->field_name)
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Post additiona data </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Posts </li>
                    <li class="breadcrumb-item active">Post additiona data</li>
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
                    <span>Edit post edditional fields details</span>
                    
                    <div class="card-header-right">
                        <a href="/access/website/post-additional-fields" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i> View fields</a>
                    </div>
                </div>
            </div>
        </div>
    </div>         
</div>


<div class="modal fade" id="addField" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <div class="animate-widget">
                        <div class="p-25">
                           <form id="main_menu" method="post" enctype="multipart/form-data">  @csrf
                                @include('pages.page_content.fields.form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Update data</button>
                                </div>
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
     $('#addField').modal({backdrop:'static',keyboard:false, show:true}); 
    })
</script>
@endsection