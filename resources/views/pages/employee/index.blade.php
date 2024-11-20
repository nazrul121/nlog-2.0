@extends('layouts.dashboard')

@section('title','Employees table')
@section('content')
<link rel="stylesheet" href="/assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Employees
                    <small>Manipulate employees data</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Employees </li>
                    <li class="breadcrumb-item active">Employees Record</li>
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
                    <span>All employees records are here. You should make some employee category first
                    <ul class="nav-menus pull-right text-right">
                        <li class="onhover-dropdown">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h6 class="m-0 txt-dark f-16"> Options <i class="fa fa-angle-down pull-right ml-2"></i>
                                    </h6>
                                </div>
                            </div>
                            <ul class="onhover-show-div p-20" style="top:20px;position:relative;margin-bottom:-90px;">
                                <li><a href="#" data-toggle="modal" data-target="#createEmp">  <i class="icon-user"></i> Add Employee  </a> </li><br>
                                <li><a href="/access/employee/category">  <i class="fa fa-tags"></i> Employee Categories </a> </li>
                            </ul>
                        </li>
                    </ul>
                   </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Image</th> <th scope="col">Employee Name</th>
                                <th scope="col">Position</th><th scope="col">Salary</th><th scope="col">Status</th><th scope="col" class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($employees->count()>0)
                                @foreach($employees as $key=>$employee)
                                <tr>
                                    <th class="bd-t-none" scope="row"><img src="/{{$employee->photo}}" style="height:45px"></th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->position}}</td>
                                    <td>{{$employee->salary}}</td>
                                    <td>
                                        @if($employee->status=='1') Active @else Inactive @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="/access/employee/edit-employee/{{$employee->id}}"><i class="fa fa-edit"></i></a>
                                        
                                    </td>
                                </tr> @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="row text-center mt-3"><center>{{$employees->links()}}</center></div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal to create !-->
<div class="modal fade" id="createEmp" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="width:90%">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post" enctype="multipart/form-data"> @csrf
                    <div class="card-header"> <h5>Add new Employee</h5> </div>
                    <div class="card-body">
                        @include('pages.employee.form')
                    </div>
                    <div class="card-footer mb-3">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save Employee info</button>
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
        $('.dropify').dropify({height:160});

        @if(Session::has('create_emp')) $('#createEmp').modal('show'); @endif
    })
</script>
@endsection