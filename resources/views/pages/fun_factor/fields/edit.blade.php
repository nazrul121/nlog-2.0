@extends('layouts.dashboard')

@section('title','Fun Factors')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Edit {{$fun_factor_field->field_name}}
                    <small>Manipulate Fun Factor-field  ({{$fun_factor_field->field_name}}) </small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="/home"><i class="fa fa-home"> Dashboard</i></a></li>
                    <li class="breadcrumb-item">Edit</li>
                    <li class="breadcrumb-item active">{{$fun_factor_field->field_name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Modal to create !-->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close">
                <a href="/access/website/fun-factors"><span aria-hidden="true">×</span></a>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post" enctype="multipart/form-data"> @csrf
                    <div class="card-header"> <h5>Create new user for the system</h5> </div>
                    <div class="card-body">
                       @include('pages.fun_factor.fields.form')
                    </div>
                    <div class="card-footer mb-3">
                        <button type="submit" class="btn btn-success pull-right "><i class="fa fa-edit"></i> Update Record</button>
                      
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">     
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    $('#createUser').modal({backdrop:'static',keyboard:false, show:true});
  })
</script>
@endsection