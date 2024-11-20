@extends('layouts.dashboard')

@section('title','Deploy employee')
@section('content')

<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Deploy Employee</h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Employee </li>
                    <li class="breadcrumb-item active">New employee</li>
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
                    <span>Create new employee information</span>
        
                    <div class="card-header-right">
                        <a href="/access/employee/employee-table" class="btn btn-success btn-xs"><i class="fa fa-search text-primary"></i> View Employees</a>
                        <a href="/access/employee/category" class="btn btn-success btn-xs"><i class="fa fa-tags text-warning"></i> Employees types</a>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">@csrf
                <div class="card-body megaoptions-border-space-sm">
                    <div class="row">
                        @include('pages.employee.form')
                    </div>    
                </div>
                <div class="card-footer text-right mb-3">
                       
                    <button type="submit" class="btn btn-success m-r-15"><i class="fa fa-check"></i> Save Employee</button>
                          
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

    if ({{Request::segment(3)=='create-employee'}}) {
        $('.page-body-wrapper').addClass('sidebar-close');
    }
  })
</script>
@endsection
