@extends('layouts.dashboard')

@section('title','Post additiona data')
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
                    <span>Post additional informatoin manipulation</span>
                    
                    <div class="card-header-right">
                        <a href="#" data-toggle="modal" data-target="#addField" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add a field</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th> <th scope="col">Field Name</th><th scope="col">Field Data</th>
                               <th scope="col" class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fields as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->field_name}}</td>
                                <td>{{$row->field_value}}</td>
                                <td class="text-right">
                                    <a class="btn btn-outline-info" href="/access/website/edit-additional-field/{{$row->id}}"><i class="fa fa-edit"></i></a> &nbsp; 
                                    
                                    <form class="pull-right" onclick="return confirm('Are you sure to remove the menu item?? --It will aslo remove all relavent menus and it`s data');" action="/access/website/delete-additional-field/{{$row->id}}" method="POST">
                                       @csrf {{ method_field('DELETE') }}
                                        <button class="btn btn-outline-danger pull-right"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Save data</button>
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
        @if(Session::has('field')) $('#addField').modal({backdrop:'static',keyboard:false, show:true}); @endif
 
    })
</script>
@endsection