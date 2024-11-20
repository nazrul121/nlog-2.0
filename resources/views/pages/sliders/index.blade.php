@extends('layouts.dashboard')

@section('title','Sliders')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Sliders
                    <small>Manipulate Sliders of the system</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Menu </li>
                    <li class="breadcrumb-item active">Sliders</li>
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
                    <span>sliders in pages and it`s content manipulation</span>
                    <div class="card-header-right">
                        <a href="{{url('/access/website/slider/create-slider')}}" class="btn btn-square btn-info btn-sm">Add slider</a>
                        <a href="{{url('/access/website/slider/types')}}" class="btn btn-square btn-primary btn-sm"> Slider types</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Image</th> <th scope="col">Slider Type</th>
                                <th scope="col">Page</th> <th scope="col">Slide Title</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($sliders->count()>0)
                                @foreach($sliders as $key=>$slider)
                                <tr>
                                    <th class="bd-t-none" scope="row">
                                        @if($slider->photo!=null)
                                            <img src="/{{$slider->photo}}" style="height:45px">
                                        @endif
                                    </th>
                                    <td>{{$slider->slider_type->title}}</td>
                                    <td>{{$slider->main_menu->title}}</td>
                                    <td> 
                                        @if( strlen($slider->title) > 50 )
                                            {{mb_substr($slider->title,0,50)}} <a href="#">...</a>
                                        @else {{$slider->title}} @endif
                                    </td>
                                    <td>
                                        @if($slider->status=='1') Active @else Inactive @endif
                                    </td>
                                    <th class="text-right">
                                        <a title="Edit slider" href="{{url('/access/website/slider/edit-slider/'.$slider->id)}}"><i class="fa fa-edit"></i></a> &nbsp; 
                                        @if($slider->slider_type_id=='3')
                                            @if($slider->main_menu_id!='')
                                                <a title="Add/Remove emploees in slider" href="/access/website/slider/employee-slider/main_menu/{{$slider->main_menu_id}}/{{$slider->id}}"><i class="fa fa-users"></i></a>
                                            @endif
                                        @endif

                                        @if($slider->slider_type_id=='2')
                                            @if($slider->main_menu_id!='')
                                                <a title="Add/Remove Client in slider" href="/access/website/slider/logo-slider/main_menu/{{$slider->main_menu_id}}/{{$slider->id}}"><i class="fa fa-image"></i></a>
                                            @endif
                                        @endif

                                    </th>
                                </tr> @endforeach
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