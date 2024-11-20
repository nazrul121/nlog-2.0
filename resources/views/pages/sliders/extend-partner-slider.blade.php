@extends('layouts.dashboard')

@section('title','Sliders')
@section('content')

@inject('partnerSlider','\App\Models\Partner_slider')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3> Partner Slider </h3>
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

<p class="alert text-center">Set <b>{{$slider->clientOrPartner}}</b> photo slider</p>
<!-- <div class="sort_resutl">Ajax Drag-drop Result here</div> -->

<div class="container-fluid">
    <div class="row">    
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Partner list Section</h5>
                            <span>To add an<code> partner </code> to <code>Partner slider </code>  Drag that employee to the <b>partner slider section</b></span>
                        </div>
                        <div class="card-body">
                           <div id="container1" class="panel-body box-container">
                                <ul class="list-group">
                                    @foreach($partners as $key=>$partner)
                                    @if($partnerSlider->is_partner_in_slider($partner->id, $type, $id) == '0')
                                    <li style="cursor:all-scroll;" partner_id="{{$partner->id}}" class="list-group-item  box-item">{{$partner->name}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Partner slider section</h5>
                            <span>To Remove an<code> Partner </code> from <code>Partner slider </code>  Drag that employee to the <b>partner list Section</b></span>
                        </div>
                        <div class="card-body">
                           <div id="container2" class="panel-body box-container">
                               <ul class="list-group">
                                    @foreach($partner_sliders as $key=>$slier)
                                    <li style="cursor:all-scroll;" partner_id="{{$slier->partner_id}}" class="list-group-item  box-item">{{$slier->partner->name}}</li>
                                    @endforeach
                                </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" href="{{asset('assets/bootstrap3.3.6.css')}}" />
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<style type="text/css">
    .box-container { height: 200px;}
    .box-item {width: 100%; z-index: 1000}
</style>
<script>
$(document).ready(function() {
  $('.box-item').draggable({ cursor: 'move', helper: "clone"});

  $("#container1").droppable({
    drop: function(event, ui) {
      var partner_id = $(event.originalEvent.toElement).attr("partner_id");
      $('.box-item').each(function() {
        if ($(this).attr("partner_id") === partner_id) {
            $(this).appendTo("#container1");
            $.ajax({
                url:"/access/set-logo-slider/remove/{{$type}}/{{$id}}/{{$slider->id}}", method:"get",
                data:{partner_id:$(this).attr("partner_id")},
               success:function(data){ $('.sort_resutl').html(data);}
            });
        }
      });
    }
  });

  $("#container2").droppable({
    drop: function(event, ui) {
      var partner_id = $(event.originalEvent.toElement).attr("partner_id");
      $('.box-item').each(function() {
        if ($(this).attr("partner_id") === partner_id) {
            $(this).appendTo("#container2");
            $.ajax({
                url:"/access/set-logo-slider/add/{{$type}}/{{$id}}/{{$slider->id}}", method:"get",
                data:{partner_id:$(this).attr("partner_id")},
               success:function(data){ $('.sort_resutl').html(data);}
            });
        }
      });
    }
  });

});
</script>
@endsection