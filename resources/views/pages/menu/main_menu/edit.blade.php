@extends('layouts.dashboard')

@section('title','Edit Main menus')
@section('content')

@inject('subMenuM','\App\Models\Sub_menu')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Menu and Page
                    <small>Page and menu manipulation</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Menu </li>
                    <li class="breadcrumb-item active">Edit Main-Menu</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mainMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" aria-label="Close">
                <a href="{{url('/access/website/main-menus')}}"><span aria-hidden="true">×</span></a>
            </button>
            <div class="modal-body">
                <div class="card">
                    <div class="animate-widget">
                        <div class="p-25">
                           <form id="main_menu" method="post" enctype="multipart/form-data">  @csrf
                                @include('pages.menu.main_menu.form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Update Menu</button>
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
     $('#mainMenu').modal({backdrop:'static',keyboard:false, show:true});
     $('.dropify').dropify({height:160});
    })
</script>
@endsection