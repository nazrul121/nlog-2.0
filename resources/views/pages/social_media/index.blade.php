@extends('layouts.dashboard')

@section('title','Company social media')
@section('content')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Social Medial links
                    <small>Manipulate Company Social Medial links</small>
                </h3>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Company </li>
                    <li class="breadcrumb-item active">Social Medial</li>
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
                    <span>Page, Menu and it`s content manipulation 
                        <a href="{{url('/access/company/create-social-info')}}" class="btn btn-sm pull-right">Add media</a></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive user-status">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">#</th> <th scope="col">Media name</th> 
                                <th scope="col">Icon</th> <th scope="col">Link</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($list->count()>0)
                                @foreach($list as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->media_name}}</td>
                                    <td><i class="{{$row->media_icon}}" style="font-size:25px;"></i></td>
                                    <td>{{$row->link}}</td>
                                    <td class="text-right">
                                        
                                        <a href="{{url('/access/company/edit-social-info/'.$row->id)}}"><i class="fa fa-edit"></i></a> &nbsp; 

                                    </td>
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

<!-- Modal to create !-->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post" enctype="multipart/form-data"> @csrf
                    <div class="card-header"> <h5>Add new mdeia information</h5> </div>
                    <div class="card-body">
                        @include('pages.social_media.form')
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

        @if(Session::has('create_user')) $('#createUser').modal('show'); @endif
    })
</script>
@endsection