@extends('layouts.dashboard')

@section('title','Edit '.$employee_type->name)
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Employee category  <small>All category records are here</small>  </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Employees </li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    	<div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <span>Manipulate employees category data
                    <ul class="nav-menus pull-right text-right">
                        <li class="onhover-dropdown">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h6 class="m-0 txt-dark f-16"> Options <i class="fa fa-angle-down pull-right ml-2"></i>
                                    </h6>
                                </div>
                            </div>
                            <ul class="onhover-show-div p-20" style="top:20px;position:relative; margin-bottom: -90px;">
                                <li><a href="#" data-toggle="modal" data-target="#createCat">  <i class="fa fa-plus"></i> Create Category </a> </li><br>
                                <li><a href="/access/employee/employee-table">  <i class="icon-user"></i> View Employees  </a> </li>
                            </ul>
                        </li>
                    </ul>
                   </span>
                </div>
                <div class="card-body">
                    @include('pages.employee.category.category-list')
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal to create !-->
<div class="modal fade" id="createCat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card add">
                    <form class="theme-form" method="post"> @csrf
                    <div class="card-header"> <h5>Create new category</h5> </div>
                    <div class="card-body">
                        @include('pages.employee.category.form')
                    </div>
                    <div class="card-footer mb-3">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Update Category</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
         $('#createCat').modal('show'); 
    })
</script>
@endsection