@extends('layouts.dashboard')

@section('title','Forms')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Forms 
                    <small>Manipulate forms of the system</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Dashboard</i></a></li>
                    <li class="breadcrumb-item active">Forms</li>
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
                    <span>Forms in pages and it`s content manipulation</span>
                    <div class="card-header-right">
                        <a href="{{url('/access/website/create-forms')}}" class="btn btn-square btn-info btn-sm">Create Forms</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Page</th>  <th scope="col">Form title</th>     
                                <th scope="col">Form Content</th> <th scope="col">Status</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($forms->count()>0)
                                @foreach($forms as $key=>$form)
                                    <tr> 
                                        <td>{{ $form->main_menu->title  }}</td>
                                        <td>
                                        @if(strlen($form->title)>30)
                                            {{ mb_substr($form->title,0,30) }}  <a href="#">....</a>
                                        @else {{$form->title}} @endif
                                        </td>
                                        <td>@if(strlen(strip_tags($form->description))>30)
                                            {{ mb_substr(strip_tags($form->description),0,30) }}  <a href="#">....</a>
                                        @else {{strip_tags($form->description)}} @endif</td>
                                        <td>@if($form->status=='1') Active @else Inactive @endif </td>
                                        <td class="text-right">
                                            <div class="input-group-btn btn btn-square p-0">
                                                <button type="button" class="btn btn-primary dropdown-toggle btn-square" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu pull-right" x-placement="bottom-start" style="position: absolute; transform: translate3d(353px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a class="dropdown-item" href="{{url('/access/website/edit-form/'.$form->id)}}">
                                                    <i class="fa fa-edit"></i> Edit form general data</a></li>

                                                    <li><a href="{{url('/access/website/edit-form-fields/'.$form->id)}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit created form</a></li>

                                                    <li><a href="{{url('/access/website/extend-form/'.$form->id)}}" class="dropdown-item"><i class="fa fa-plus"></i> extend form</a></li>

                                                    <li><a href="{{url('/access/website/show-form/'.$form->id)}}" class="dropdown-item"><i class="fa fa-search"></i> View created form</a></li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

  
    </div>
</div>
@endsection