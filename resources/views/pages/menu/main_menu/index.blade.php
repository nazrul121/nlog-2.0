@extends('layouts.dashboard')

@section('title','System menus')
@section('content')

@inject('subMenuM','\App\Models\Sub_menu')
<link rel="stylesheet" href="{{asset('assets/dropify/css/dropify.min.css')}}">
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Menu and Page
                    <small>Page and menu manipulation</small>
                </h3>
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
    	<div class="col-sm-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <span>Page, Menu and it`s content manipulation</span>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><a href="" class="icofont icofont-refresh reload-card"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="sortable">
                	@foreach($menus AS $key=>$row)
                    <div class="ui-state-default" id="{{$row->id}}">
                        <div class="card mb-2">
                            <div class="card-header p-3" id="heading{{$key}}">
                                <h6 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}"> {{$row->title}} <span class="digits"> 
									 #<b>{{$row->sub_menus->count()}} </b></span> - {{$row->page_post_type}} view 
                                     @if($row->status=='1')<i title="Active" class="fa fa-check"></i> @else <i title="Inactive" class="fa fa-eye-slash text-danger"></i> @endif
                                    </button>
	                                <div class="btn-group btn-group-pill pull-right" role="group">
	                                    <a href="/access/website/edit-main-menu/{{$row->title}}" class="btn btn-outline-success">Edit</a>

                                        <form class="pull-right" onclick="return confirm('Are you sure to remove the menu item?? --It will aslo remove all relavent menus and it`s data');" action="/access/website/delete-menu/{{$row->title}}" method="POST">
                                           @csrf {{ method_field('DELETE') }}
                                            <button class="btn btn-outline-danger pull-right">Delete</button>
                                        </form>
	                                </div>
                                </h6>
                            </div>
                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="list-group">
	                                    @foreach($row->sub_menus as $sub)
	                                    <div class="list-group-item list-group-item-action">
	                                        {{$sub->page_post_type}}
                                            <i class="fa fa-angle-right"></i>{{$sub->title}} - 
                                            @if($sub->status=='1')<i title="Active" class="fa fa-check"></i> @else <i title="Inactive" class="fa fa-eye-slash text-danger"></i> @endif
                                            <form class="pull-right" onclick="return confirm('Are you sure to remove the content for every??');" action="/access/website/delete-sub-menu/{{$sub->id}}" method="POST">
                                               @csrf  {{ method_field('DELETE') }}
                                                <button class="btn btn-square btn-danger btn-xs pull-right">Delete</button>
                                            </form>
                                            &nbsp; 
                                        	<a href="/access/website/edit-sub-menu/{{$sub->id}}" class="btn btn-square btn-info btn-xs pull-right" >Edit</a>
	                                    </div>
                                        
	                                    @endforeach
	                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xl-4">
            <div class="card text-center">
                <div class="card-header">
                    <h5>Create Menu</h5>
                </div>
                <div class="card-body">
                	<button type="button" data-toggle="modal" data-target="#mainMenu" class="btn btn-pill btn-lg btn-info-gradien menu">Add Main-menu</button><br><br>

                	<button type="button" data-toggle="modal" data-target="#subMenu" class="btn btn-pill btn-lg btn-primary-gradien menu">Add Sub-menu</button>
                </div>
            </div>
        </div>
  
    </div>
</div>

<div class="modal fade" id="mainMenu" tabindex="-1" role="dialog">
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
                                @include('pages.menu.main_menu.form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save Menu</button>
                                </div>
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="subMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <div class="animate-widget">
                        <div class="p-25">
                            <form id="sub_menu" method="post" enctype="multipart/form-data" action="{{url('/access/website/sub-menu')}}"> @csrf
                                @include('pages.menu.sub_menu.form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save Menu</button>
                                </div>
                            </form> <br>
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
        $( "#sortable" ).sortable({
            update  : function(event, ui) {
                var page_id_array = new Array();
                $('.ui-state-default').each(function(){
                    page_id_array.push($(this).attr("id"));
                });
                $.ajax({ 
                    url:"/access/sort-menus", method:"get",data:{page_id_array:page_id_array},
                   success:function(data){ $('.sort_resutl').html(data);}
               });
            }
        })

		@if(Session::has('main_menu')) $('#mainMenu').modal({backdrop:'static',keyboard:false, show:true}); @endif
 
		@if(Session::has('sub_menu')) $('#subMenu').modal({backdrop:'static',keyboard:false, show:true}); @endif
		//set menu title null
		$('.menu').on('click',function(){
            $('[name=title]').val('');  $('[name=short_description]').val('');
            $(".dropify-clear").trigger("click");
        })

        $('.dropify').dropify({height:160});
	})
</script>
@endsection