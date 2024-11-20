@extends('layouts.dashboard')

@section('title','Welcome greetings')
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Welcome Greetings </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Grettings </li>
                    <li class="breadcrumb-item active">Welcome Grettings</li>
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
                    <span>Welcome Grettings  and it`s content manipulation</span>
                    
                    <div class="card-header-right">
                        <a href="#" data-toggle="modal" data-target="#addGreeting" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Greetig</a>                       
                    </div>
                </div>
                <div class="card-body">
                    @include('pages.greetings.greeting-list')
                </div>
            </div>
        </div>
    </div>         
</div>

<div class="modal fade" id="addGreeting" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <div class="animate-widget">
                        <div class="p-25">
                           <form method="post" enctype="multipart/form-data">  @csrf
                                @include('pages.greetings.form') <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save Greeting</button>
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
        $('.dropify').dropify({height:160});
        @if(Session::has('greetings')) $('#addGreeting').modal('show'); @endif
    })
</script>
@endsection