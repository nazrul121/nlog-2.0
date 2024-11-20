@extends('layouts.dashboard')

@section('title','Page Contents')
@section('content')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Page Contents </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Menu </li>
                    <li class="breadcrumb-item active">Main & Sub menu</li>
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
                    <span>Page, Menu and it`s content manipulation</span>
                    
                    <div class="card-header-right">
                        <a href="{{url('/access/website/create-post')}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Content</a>
                        <a href="{{url('/access/website/post-additional-fields')}}" class="btn btn-success btn-xs"><i class="fa fa-tags"></i> additional Fields</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Image</th> <th scope="col">Page</th>
                                <th scope="col">Post Title</th> <th scope="col">Description</th>
                                <th scope="col">Status</th><th scope="col" class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key=>$post)
                            <tr>
                                <th class="bd-t-none" scope="row"><img src="{{url('/'.$post->photo)}}" style="height:45px"></th>
                                <td>{{$post->main_menu->title}}</td>
                                <td> 
                                    @if( strlen($post->title) > 50 )
                                        {{mb_substr($post->title,0,50)}} <a href="#">...</a>
                                    @else  {{$post->title}} @endif
                                </td>
                                <td>{{mb_substr(strip_tags($post->description),0,40)}} <a href="#">...</a></td>
                                <td>@if($post->status=='1') Active @else Inactive @endif</td>
                                <td class="text-right">
                                    <a href="{{url('/access/website/edit-post/'.$post->id)}}"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <form class="pull-right" onclick="return confirm('Are you sure to remove the menu item?? --It will aslo remove all relavent menus and it`s data');" action="{{url('/access/website/delete-post/'.$post->id)}}" method="POST">
                                           @csrf {{ method_field('DELETE') }}
                                            <button type="submit" class="pull-right text-danger" style="border:0;padding:0px;"><i class="fa fa-trash"></i></button>
                                        </form>
                                </td>
                            </tr> @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
                
</div>
            
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>

@endsection